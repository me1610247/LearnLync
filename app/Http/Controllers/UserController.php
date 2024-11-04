<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\AssignSubject;
use Illuminate\Support\Facades\Hash; 
use App\Models\Announcement;

class UserController extends Controller
{
    public function index(){
        return view('student.login');
    }
    public function authenticate(Request $request){
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
        {
            if(Auth::user()->role != 'student'){
                Auth::logout();
                return redirect()->route('student.login')->with('error','Not Authorized , Access Denied');
            }
            return redirect()->route('student.dashboard');
        }
            else{
                return redirect()->route('student.login')->with('error','Something went wrong');
        }
    
    }
    public function dashboard()
{
    $announcement = Announcement::where('type', 'student')->latest()->limit(1)->get();
    // Get the student's class
    $studentClassId = Auth::user()->class_id; // Make sure the user has a class_id
    // Fetch the subjects assigned to the class
    $assignedSubjects = AssignSubject::where('class_id', $studentClassId)->with('subject')->get();

    return view('student.dashboard', compact('announcement', 'assignedSubjects'));
}

    public function logout(){
        Auth::logout();
        return redirect()->route('student.login')->with('error','Logged out Successfully');

    }
    public function changePassword(){
        return view('student.change-password');
    }
    public function updatePassword(Request $request){
        $request->validate([
            'old_password'=>'required',
            'new_password'=>'required',
            'confirm_password'=>'required|same:new_password'
        ]);
        $old_password = $request->old_password;
        $new_password = $request->new_password;
        $user = User::find(Auth::user()->id);
        if(Hash::check($old_password, $user->password)){
            $user->password = $new_password;
            $user->save();
            return redirect()->back()->with('success',' Password Changed Successfully');


        }else{
            return redirect()->back()->with('error','Old password Is Incorrect');
        }
    }
}
