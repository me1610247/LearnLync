<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User;
use App\Events\ChatSent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
{
    // Show chat form between a specific user (teacher or student) and the authenticated user
    public function chatForm($user_id)
    {
        $recipient = User::findOrFail($user_id); // Ensure user_id is valid
        $authId = Auth::guard('teacher')->check() ? Auth::guard('teacher')->id() : Auth::id();
    
        $messages = Message::where(function ($query) use ($authId, $recipient) {
                $query->where('sender_id', $authId)
                      ->where('receiver_id', $recipient->id);
            })
            ->orWhere(function ($query) use ($authId, $recipient) {
                $query->where('sender_id', $recipient->id)
                      ->where('receiver_id', $authId);
            })
            ->orderBy('created_at', 'asc')
            ->get();
    
        // Check if user is a teacher with the 'doctor' role
        if (Auth::guard('teacher')->check() && Auth::guard('teacher')->user()->role === 'doctor') {
            return view('teacher.chat', compact('recipient', 'messages'));
        }
        // Check if user is a student
        elseif (Auth::check() && Auth::user()->role === 'student') {
            return view('student.chat', compact('recipient', 'messages'));
        }
    
        // Redirect to login or dashboard if unauthorized
        return redirect()->route('login')->with('error', 'Unauthorized access');
    }
    
    
    
    // Show recent messages for the logged-in student
    public function messages()
    {
        $authId = Auth::id(); // The authenticated student's ID
    
        // Fetch the latest message for each unique conversation involving the authenticated user
        $recentMessages = Message::select('messages.*')
            ->where(function ($query) use ($authId) {
                $query->where('sender_id', $authId)
                      ->orWhere('receiver_id', $authId);
            })
            ->whereIn('id', function ($query) use ($authId) {
                $query->select(\DB::raw('MAX(id)')) // Select the latest message ID per conversation
                    ->from('messages')
                    ->where('sender_id', $authId)
                    ->orWhere('receiver_id', $authId)
                    ->groupBy(\DB::raw('LEAST(sender_id, receiver_id), GREATEST(sender_id, receiver_id)'));
            })
            ->with(['sender', 'receiver']) // Load sender and receiver data
            ->orderBy('created_at', 'desc')
            ->get();
    
        return view('student.messages', compact('recentMessages'));
    }
    public function teacherMessages()
    {
        $authId = Auth::guard('teacher')->user()->id;
    
        // Fetch the latest message for each unique conversation involving the authenticated teacher
        $recentMessages = Message::select('messages.*')
            ->where(function ($query) use ($authId) {
                $query->where('sender_id', $authId)
                      ->orWhere('receiver_id', $authId);
            })
            ->whereIn('id', function ($query) use ($authId) {
                $query->select(\DB::raw('MAX(id)'))
                    ->from('messages')
                    ->where('sender_id', $authId)
                    ->orWhere('receiver_id', $authId)
                    ->groupBy(\DB::raw('LEAST(sender_id, receiver_id), GREATEST(sender_id, receiver_id)'));
            })
            ->with(['sender', 'receiver']) // Load sender and receiver data
            ->orderBy('created_at', 'desc')
            ->get();
    
        return view('teacher.messages', compact('recentMessages'));
    }
    
    public function search(Request $request)
    {
        // Check if the user is authenticated
        if (!Auth::guard('web')->check()) {
            return redirect()->route('student.login'); // Redirect to login if not authenticated
        }
    
        $email = $request->query('email');
    
        if (!$email) {
            return redirect()->route('student.messages'); // Redirect if no email is provided
        }
    
        // Perform the search
        $users = User::where('email', 'LIKE', "%$email%")->get();
    
        return response()->json($users);
    }
    
    
    
    // Send message to a specific user
    public function sendMessage(Request $request, $user_id)
    {
        $request->validate([
            'message' => 'required|string',
        ]);
    
        // Determine the sender's ID based on the guard type
        if (auth()->guard('teacher')->check()) {
            $senderId = auth()->guard('teacher')->id();
            $redirectRoute = 'teacher.chatForm'; // Update this to the correct route name for the teacher chat form
        } else {
            $senderId = auth()->id();
            $redirectRoute = 'student.chatForm'; // Update this to the correct route name for the student chat form
        }
    
        // Create a new message with the correct sender ID
        $message = Message::create([
            'sender_id' => $senderId,
            'receiver_id' => $user_id,
            'message' => $request->message,
        ]);
    
        // Dispatch the ChatSent event to broadcast the message
        $recipient = User::findOrFail($user_id);
        broadcast(new ChatSent($recipient, $message->message))->toOthers();
    
        // Redirect back to the appropriate chat form
        return redirect()->route($redirectRoute, $user_id);
    }
}
