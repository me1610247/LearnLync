<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.subject.subject');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'code' => 'required|string',
            'type' => 'required',
            'credit_hours' => 'required|integer', // Use integer or numeric here
            'instructor' => 'required|string'
        ]);
    
        $subject = new Subject();
        $subject->name = $request->name;
        $subject->code = $request->code;
        $subject->type = $request->type;
        $subject->credit_hours = $request->credit_hours;
        $subject->instructor = $request->instructor;
        $subject->save();
    
        return redirect()->route('subject.create')->with('success', 'Subject created successfully.');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(){
        $subjects=Subject::where('status','1')->latest()->paginate(10);
        return view('admin.subject.subject-list',compact('subjects'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $subject=Subject::find($id);
        return view('admin.subject.subject-edit',compact('subject'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $subject=Subject::find($id);

        $request->validate([
            'name'=>'required|string',
            'code'=>'required|string',
            'type'=>'required'
        ]);
        $subject->name=$request->name;
        $subject->code=$request->code;
        $subject->type=$request->type;
        $subject->save();
        return redirect()->route('subject.show',$subject->id)->with('success', 'Subject Updated successfully.');


    }

    public function delete($id){
        $subject = Subject::find($id);
        $subject->delete();
        return redirect()->route('subject.show')->with('success','Subject Deleted Successfully');
    }
    public function search(Request $request)
    {
        $search = $request->input('search');
    
        // Fetch academic years and classes
        $subject = Subject::all();    
        $subjects = Subject::when($search, function ($query, $search) {
                return $query->where('name', 'like', "%{$search}%")
                    ->orWhere('code', $search)
                    ->orWhere('type', $search);

            })
            ->paginate(10);
    
        return view('admin.subject.subject-list', compact('subjects', 'search'));
    }
}
