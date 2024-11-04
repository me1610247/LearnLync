<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Announcement;

class AnnouncementController extends Controller
{
    public function index(){
        return view('admin.announcement.form');
    }
    public function store(Request $request){
        $validatedData = $request->validate([
            'message' => 'required|string|max:255',
            'type' => 'required|in:student,doctor',
        ]);
        $announcement = new Announcement(); 
        $announcement->message = $request->message;
        $announcement->type = $request->type;
        $announcement->save();
        return redirect()->route('announcement.create')->with('success','Announcement Broadcast successfully');
    }
    public function show(){
        $announcements=Announcement::paginate(10);
        return view('admin.announcement.list',compact('announcements'));
    }
    public function edit($id){
        $announcement=Announcement::find($id);
        return view('admin.announcement.edit',compact('announcement'));
    }
    public function update(Request $request,$id){
        $announcement=Announcement::find($id);
        $announcement = new Announcement(); 
        $announcement->message = $request->message;
        $announcement->type = $request->type;
        $announcement->save();
        return redirect()->route('announcement.show')->with('success','Announcement Updated successfully');
    }
    public function delete($id)
    {
        $announcement = Announcement::find($id);
        // Check if the record exists
        if (!$announcement) {
            return redirect()->route('announcement.show')->with('error', 'Announcement not found');
        }
    
        $announcement->delete();
        return redirect()->route('announcement.show')->with('success', 'Announcement Deleted Successfully');
    }
}

