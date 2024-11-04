<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeeHead;

class FeeHeadController extends Controller
{
    public function index(){
        return view('admin.fee.fee-head');
    }
    public function store(Request $request){
        $request->validate([
            'name'=> 'required',
        ]);
        $name= new FeeHead();
        $name->name=$request->name;
        $name->save();
        return redirect()->route('fee-head.create')->with('success','Fee Head Added Successfully');
    }
    public function show(){
        $fees = FeeHead::latest()->paginate(10);
        return view('admin.fee.fee-head-list',compact('fees'));
    }
    public function edit($id){
        $req=FeeHead::find($id);
        return view('admin.fee.fee-head-edit',compact('req'));
    }
    public function update(Request $request){
        $request->validate([
            'name' => 'required',
        ]);
    
        $fee = FeeHead::find($request->id); // Fetch class by ID from the request
    
        if (!$fee) {
            return redirect()->back()->with('error', 'Fee Head not found.');
        }
    
        $fee->name = $request->name;
        $fee->save();
    
        return redirect()->route('fee-head.show')->with('success', 'Fee Head updated successfully');
    }
    public function delete($id)
    {
        $data = FeeHead::find($id);
        // Check if the record exists
        if (!$data) {
            return redirect()->route('fee-head.show')->with('error', 'Fee Head not found');
        }
    
        $data->delete();
        return redirect()->route('fee-head.show')->with('success', 'Fee Head Deleted Successfully');
    }
}
