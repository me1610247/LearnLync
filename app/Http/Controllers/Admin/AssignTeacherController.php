<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\AssignTeacher;
use Illuminate\Http\Request;
use App\Models\Classes;
use App\Models\Subject;
use App\Models\User;

class AssignTeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['classes']=Classes::all();
        $data['teachers']=User::where('role','doctor')->latest()->get();
        $data['subjects']=Subject::all();
        return view('admin.assign-teacher.create',$data);
    }
    public function getSubjectsByClass(Request $request)
    {
        $class_id = $request->class_id;
        $subjects = AssignSubject::with('subject')->where('class_id', $class_id)->get();
        
        if ($subjects->isEmpty()) {
            return response()->json([
                'status' => false,
                'message' => 'No subjects found for this class.',
            ]);
        }
    
        return response()->json([
            'status' => true,
            'subjects' => $subjects,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'class_id'=>'required',
            'subject_id'=>'required',
            'teacher_id' => 'required|exists:teachers,id',
        ]);
        $teacher = new AssignTeacher(); 
        $teacher->class_id = $request->class_id;
        $teacher->subject_id = $request->subject_id;
        $teacher->teacher_id = $request->teacher_id;
        $teacher->save();
        return redirect()->route('assign.create')->with('success', 'Teachers Assigned Created successfully.');

    }
    /**
     * Display the specified resource.
     */
    public function show(AssignTeacher $assignTeacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AssignTeacher $assignTeacher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AssignTeacher $assignTeacher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AssignTeacher $assignTeacher)
    {
        //
    }
}
