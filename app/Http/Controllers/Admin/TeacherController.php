<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    public function index(){
        return view('admin.teacher.teacher');
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',   // Name validation with max length
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',        // Password minimum length
            'dob' => 'required|date',              // Date of birth validation
            'phone' => 'required|numeric',         // Numeric phone validation
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->phone = $request->phone;
        $user->dob = $request->dob;
        $user->role='doctor';
        $user->save();
        return redirect()->route('teacher.create')->with('success', 'Teacher created successfully.');
    }
    public function show(){
        $teachers=User::where('role','doctor')->latest()->paginate();
        return view('admin.teacher.teacher-list',compact('teachers'));
   
    }
    public function search(Request $request)
{
    $search = $request->input('search');

    // Fetch academic years and classes
    $teachers = User::where('role', 'doctor') // Filter users with role 'doctor'
        ->when($search, function ($query, $search) {
            return $query->where(function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                      ->orWhere('id', $search);
            });
        })
        ->paginate(10);

    return view('admin.teacher.teacher-list', compact('teachers', 'search'));
}
    public function edit($id){
        $teacher=User::find($id);
        return view('admin.teacher.teacher-edit',compact('teacher'));
    }
    public function update(Request $request,$id)
    {
        $teacher=User::find($id);

        $request->validate([
            'name'=>'required|string',
            'phone'=>'required|numeric',
            'email'=>'required|string',
            'password'=>'nullable|string|min:6',
            'dob'=>'required|date'
        ]);
        $teacher->name=$request->name;
        $teacher->email=$request->email;
        $teacher->dob=$request->dob;
        $teacher->phone=$request->phone;
        if ($request->filled('password')) {
            $teacher->password = Hash::make($request->password);
        }
        $teacher->save();
        return redirect()->route('teacher.show',$teacher->id)->with('success', 'Teacher Updated successfully.');
    }
    public function delete($id){
        $teacher = User::find($id);
        $teacher->delete();
        return redirect()->route('teacher.show')->with('success','Teacher Deleted Successfully');
    }
    public function login(){
        return view('teacher.login');
    }
    public function authenticate(Request $request) {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);
    
        if (Auth::guard('teacher')->attempt(['email' => $request->email, 'password' => $request->password])) {
            if(Auth::guard('teacher')->user()->role != 'doctor'){
                Auth::logout();
                return redirect()->route('teacher.login')->with('error','Not Authorized , Access Denied');
            }
            // No role-based restriction for login
            return redirect()->route('teacher.dashboard');
        } else {
            return redirect()->route('teacher.login')->with('error', 'Invalid credentials!');
        }
    }
    
    public function dashboard(){
        return view('teacher.dashboard');
    }
    public function logout(){
        Auth::guard('teacher')->logout();
        return redirect()->route('teacher.login')->with('success','Logout Successfully !');
    }
}

