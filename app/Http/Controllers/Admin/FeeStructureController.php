<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Classes;
use App\Models\AcademicYear;
use App\Models\FeeHead;
use App\Models\FeeStructure; // Make sure to import your FeeStructure model

class FeeStructureController extends Controller
{
    public function index(){
        $data['classes'] = Classes::all(); // Retrieve classes
        $data['academic_year'] = AcademicYear::all(); // Retrieve academic years
        $data['fee_heads'] = FeeHead::all(); // Retrieve fee heads
        return view('admin.fee-strcuture.fee-strcuture', $data); // Pass the data to the view
    }

    public function store(Request $request){ 
       $valid = $request->validate([
            'class' => 'required',
            'academic_year' => 'required',
            'fee_head_id' => 'required',
        ]);
        // Create a new fee structure record
        FeeStructure::create([
            'class_id' => $request->class,
            'academic_year_id' => $request->academic_year,
            'fee_head_id' => $request->fee_head_id,
            'january_fee' => $request->january_fee,
           'february_fee' => $request->february_fee,
            'march_fee' => $request->march_fee,
            'april_fee' => $request->april_fee,
            'may_fee' => $request->may_fee,
            'june_fee' => $request->june_fee,
            'july_fee' => $request->july_fee,
            'august_fee' => $request->august_fee,
            'september_fee' => $request->september_fee,
            'october_fee' => $request->october_fee,
            'november_fee' => $request->november_fee,
            'december_fee' => $request->december_fee,

        ]);
        return redirect()->route('fee-structure.create')->with('success','Fees Added Successfully');
    }
    public function show(){
        $feeStrcuture=FeeStructure::with(['feeHead','academicYear','class'])->latest()->paginate(10);
        return view('admin.fee-strcuture.fee-strcuture-list',compact('feeStrcuture')); // Pass the data to the view
    }
    public function edit($id){
        $data['fee']=FeeStructure::find($id);
        $data['classes'] = Classes::all(); // Retrieve classes
        $data['academic_year'] = AcademicYear::all(); // Retrieve academic years
        $data['fee_heads'] = FeeHead::all(); // Retrieve fee heads
        return view('admin.fee-strcuture.fee-strcuture-edit',$data);
    }
    public function update(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'class_id' => 'required|exists:classes,id',
            'academic_year_id' => 'required|exists:academic_years,id',
            'fee_head_id' => 'required|exists:fee_heads,id',
            // Validate the monthly fee fields (you can adjust the rules as needed)
            'january_fee' => 'nullable|numeric|min:0',
            'february_fee' => 'nullable|numeric|min:0',
            'march_fee' => 'nullable|numeric|min:0',
            'april_fee' => 'nullable|numeric|min:0',
            'may_fee' => 'nullable|numeric|min:0',
            'june_fee' => 'nullable|numeric|min:0',
            'july_fee' => 'nullable|numeric|min:0',
            'august_fee' => 'nullable|numeric|min:0',
            'september_fee' => 'nullable|numeric|min:0',
            'october_fee' => 'nullable|numeric|min:0',
            'november_fee' => 'nullable|numeric|min:0',
            'december_fee' => 'nullable|numeric|min:0',
        ]);
    
        // Fetch the fee structure by ID from the request
        $feeStructure = FeeStructure::find($request->id);
    
        if (!$feeStructure) {
            return redirect()->back()->with('error', 'Fee Structure not found.');
        }
    
        // Update the fee structure fields
        $feeStructure->class_id = $request->class_id;
        $feeStructure->academic_year_id = $request->academic_year_id;
        $feeStructure->fee_head_id = $request->fee_head_id;
        
        // Update monthly fee fields
        $feeStructure->january_fee = $request->january_fee;
        $feeStructure->february_fee = $request->february_fee;
        $feeStructure->march_fee = $request->march_fee;
        $feeStructure->april_fee = $request->april_fee;
        $feeStructure->may_fee = $request->may_fee;
        $feeStructure->june_fee = $request->june_fee;
        $feeStructure->july_fee = $request->july_fee;
        $feeStructure->august_fee = $request->august_fee;
        $feeStructure->september_fee = $request->september_fee;
        $feeStructure->october_fee = $request->october_fee;
        $feeStructure->november_fee = $request->november_fee;
        $feeStructure->december_fee = $request->december_fee;
    
        // Save the updated fee structure
        $feeStructure->save();
    
        return redirect()->route('fee-structurestru.show')->with('success', 'Fee Structure updated successfully');
    }
    public function search(Request $request)
{
    // Get the search query from the request
    $search = $request->input('search');

    $feeStrcuture = FeeStructure::with(['feeHead', 'class', 'academicYear'])
        ->when($search, function ($query, $search) {
            return $query->whereHas('feeHead', function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%");
            })->orWhereHas('class', function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%");
            })->orWhereHas('academicYear', function ($q) use ($search) {
                $q->where('year', 'like', "%{$search}%");
            });
        })
        ->paginate(10); // or any number you want for pagination

    return view('admin.fee-strcuture.fee-strcuture-list', compact('feeStrcuture', 'search'));
}


    public function delete($id){
        $data = FeeStructure::find($id);
        $data->delete();
        return redirect()->route('fee-structure.show')->with('success','Fee Deleted Successfully');
    }
}
