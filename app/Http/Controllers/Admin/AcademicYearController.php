<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AcademicYear;

class AcademicYearController extends Controller
{
    public function index(){
        return view('admin.academic-year');
    }
    public function store(Request $request){
        $request->validate([
            'year'=> 'required',
        ]);
        $year= new AcademicYear();
        $year->year=$request->year;
        $year->save();
        return redirect()->route('academic-year.create')->with('success','Academic Year Added Successfully');
    }
    public function show(){
        $years = AcademicYear::latest()->paginate(10);
        return view('admin.academic-year-list',compact('years'));
    }
    public function edit($id){
        $req=AcademicYear::find($id);
        return view('admin.academic-year-edit',compact('req'));
    }
    public function delete($id)
    {
        $data = AcademicYear::find($id);
        // Check if the record exists
        if (!$data) {
            return redirect()->route('academic-year.show')->with('error', 'Academic Year not found');
        }
    
        $data->delete();
        return redirect()->route('academic-year.show')->with('success', 'Academic Year Deleted Successfully');
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'year' => 'required',
        ]);
    
        $year = AcademicYear::find($id);
        
        if (!$year) {
            return redirect()->route('academic-year.show')->with('error', 'Academic Year not found');
        }
    
        $year->year = $request->year;
        $year->save();  // Use save() instead of update() here
    
        return redirect()->route('academic-year.show')->with('success', 'Academic Year Updated Successfully');
    }
    

}
