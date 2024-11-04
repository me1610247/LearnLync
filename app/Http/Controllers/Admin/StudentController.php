<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Classes;
use App\Models\AcademicYear;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function index()
{
    $classes = Classes::all();
    $academic_year = AcademicYear::all();
    
    return view('admin.student.student', compact('classes', 'academic_year'));
}
public function store(Request $request){
    $request->validate([
        'academic_year' => 'required',         // Fixed field name
        'class' => 'required',                 // Required class
        'name' => 'required|string|max:255',   // Name validation with max length
        'email' => 'required|email|unique:users,email',
        'admission_date' => 'required|date',        // Admission date is required
        'password' => 'required|min:6',        // Password minimum length
        'dob' => 'required|date',              // Date of birth validation
        'phone' => 'required|numeric',         // Numeric phone validation
    ]);
    $user = new User();
    $user->academic_year_id = $request->academic_year;
    $user->class_id=$request->class;
    $user->name = $request->name;
    $user->email = $request->email;
    $user->admission_date=$request->admission_date;
    $user->password = bcrypt($request->password);
    $user->phone = $request->phone;
    $user->dob = $request->dob;
    $user->role='student';
    $user->save();
    return redirect()->route('student.create')->with('success', 'Student created successfully.');

    }

    public function show(Request $request)
    {
        $academicYears = AcademicYear::all(); 
        $classes = Classes::all(); 
    
        $query = User::with(['academicYear', 'class'])
            ->where('role', 'student');
    
        if ($request->filled('academic_year_id')) {
            $query->where('academic_year_id', $request->get('academic_year_id'));
        }
        if ($request->filled('class_id')) {
            $query->where('class_id', $request->get('class_id'));
        }
    
        $users = $query->latest('id')->paginate(10);
    
        return view('admin.student.student-list', compact('users', 'academicYears', 'classes'));
    }
    public function search(Request $request)
    {
        $search = $request->input('search');
    
        // Fetch academic years and classes
        $academicYears = AcademicYear::all();
        $classes = Classes::all();
    
        $users = User::with(['class', 'academicYear'])
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', "%{$search}%")
                    ->orWhere('id', $search);
            })
            ->paginate(10);
    
        return view('admin.student.student-list', compact('users', 'search', 'academicYears', 'classes'));
    }
    public function edit($id) {
        $academicYears = AcademicYear::all();
        $classes = Classes::all();
        $user = User::with(['academicYear', 'class'])->find($id);
    
        return view('admin.student.student-edit', compact('user', 'academicYears', 'classes'));
    }
    public function update(Request $request, $id)
    {
        $user = User::find($id);
    
        $request->validate([
            'academic_year' => 'required',
            'class' => 'required',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'admission_date' => 'required',
            'password' => 'nullable|string|min:6',
            'dob' => 'required|date',
            'phone' => 'required|numeric',
        ]);
    
        $user->academic_year_id = $request->academic_year;
        $user->class_id = $request->class;
        $user->name = $request->name;
        $user->admission_date = $request->admission_date;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->dob = $request->dob;
    
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
    
        $user->save();
    
        return redirect()->route('student.show', $user->id)->with('success', 'Student Info Updated Successfully');
    }
    
    public function delete($id){
        $user = User::find($id);
        $user->delete();
        return redirect()->route('student.show')->with('success','Student Deleted Successfully');
    }
    
}
