<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\AssignSubject;
use Illuminate\Http\Request;
use App\Models\Classes;
use App\Models\Subject;

class AssignSubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['classes']=Classes::all();
        $data['subjects']=Subject::all();
        return view('admin.assign-subject.assign',$data);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'class'=>'required',
            'subject'=>'required',
        ]);
        $class=$request->class;
        $subject=$request->subject;
        foreach ($subject as $subject) {
            AssignSubject::updateOrCreate([
                'class_id'=>$class,
                'subject_id'=>$subject
            ],
            [
                'class_id'=>$class,
                'subject_id'=>$subject
            ]
        );
        }
        return redirect()->route('assign.create')->with('success', 'Subjects Created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $assigns = AssignSubject::with('class', 'subject')->orderBy('id','ASC')->paginate(10);
        return view('admin.assign-subject.assign-list', compact('assigns'));
    }
   
    public function edit($classId)
    {
        $assignments = AssignSubject::where('class_id', $classId)->pluck('subject_id')->toArray(); // Get assigned subject IDs
        $classes = Classes::all();
        $subjects = Subject::all();
    
        return view('admin.assign-subject.assign-edit', compact('assignments', 'classes', 'subjects', 'classId'));
    }
    public function update(Request $request, $classId)
    {
        // Validate the request
        $request->validate([
            'subject' => 'required|array', // Ensure subjects is an array
            'subject.*' => 'exists:subjects,id', // Ensure each subject exists
        ]);
    
        // Find existing assignments for the class
        $existingAssignments = AssignSubject::where('class_id', $classId)->pluck('subject_id')->toArray();
    
        // Get the new selected subjects from the request
        $selectedSubjects = $request->input('subject', []);
    
        // Delete assignments that are no longer selected
        $toDelete = array_diff($existingAssignments, $selectedSubjects);
        if (!empty($toDelete)) {
            AssignSubject::where('class_id', $classId)
                ->whereIn('subject_id', $toDelete)
                ->delete();
        }
    
        // Add new assignments that were selected but didn't exist before
        $toAdd = array_diff($selectedSubjects, $existingAssignments);
        foreach ($toAdd as $subjectId) {
            AssignSubject::create([
                'class_id' => $classId,
                'subject_id' => $subjectId,
            ]);
        }
    
        // Redirect back with success message
        return redirect()->route('assign.show')->with('success', 'Subjects updated successfully.');
    }
        
}
