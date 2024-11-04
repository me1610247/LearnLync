<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Classes;

class ClassesController extends Controller
{
    public function index(){
        return view('admin.class.class');
    }
    public function store(Request $request){
        $request->validate([
            'name'=> 'required',
        ]);
        $name= new Classes();
        $name->name=$request->name;
        $name->save();
        return redirect()->route('class.create')->with('success','Class Added Successfully');
    }
    public function show(){
        $classes = Classes::paginate(10);
        return view('admin.class.class-list',compact('classes'));
    }
    public function edit($id){
        $req=Classes::find($id);
        return view('admin.class.class-edit',compact('req'));
    }
    public function update(Request $request){
        $request->validate([
            'name' => 'required',
        ]);
    
        $class = Classes::find($request->id); // Fetch class by ID from the request
    
        if (!$class) {
            return redirect()->back()->with('error', 'Class not found.');
        }
    
        $class->name = $request->name;
        $class->save();
    
        return redirect()->route('class.show')->with('success', 'Class updated successfully');
    }
    public function delete($id)
    {
        $data = Classes::find($id);
        // Check if the record exists
        if (!$data) {
            return redirect()->route('class.show')->with('error', 'Class not found');
        }
    
        $data->delete();
        return redirect()->route('class.show')->with('success', 'Class Deleted Successfully');
    }
}
