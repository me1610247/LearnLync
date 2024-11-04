<?php

// app/Http/Controllers/ProfileController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Classes;
use App\Models\AcademicYear;

class ProfileController extends Controller
{
    // Display student profile
    public function studentProfile()
    {
        $user = Auth::user(); // Get the logged-in student
        $classes = Classes::all(); // Fetch all classes
        $academicYears = AcademicYear::all(); // Fetch all academic years
        return view('student.profile', compact('user','classes','academicYears'));
    }

    // Update student profile
    public function updateStudentProfile(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
        'phone' => 'nullable|string|max:15',
    ]);

    $user = Auth::user();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->phone = $request->phone;
    $user->save();

    return redirect()->back()->with('success', 'Profile updated successfully!');
}


    // Display admin profile
    public function adminProfile()
    {
        $user = Auth::user(); // Get the logged-in admin
        return view('admin.profile', compact('user'));
    }

    // Update admin profile
    public function updateAdminProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'nullable|string|max:15',
        ]);

        $user = Auth::user();
        $user->update($request->only('name', 'email', 'phone'));

        return redirect()->route('admin.profile')->with('success', 'Profile updated successfully.');
    }
}
