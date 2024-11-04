<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Subject;
use App\Models\User;

class AdminController extends Controller
{
    public function index(){
        return view('admin.login');
    }
    public function authenticate(Request $request){
        $request->validate([
            'email'=>'required|string',
            'password'=>'required|string',
        ]);
        if(Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password])){
            if(Auth::guard('admin')->user()->role != 'admin'){
                return redirect()->route('admin.login')->with('error','Not Authorized , Access Denied');
            }
            return redirect()->route('admin.dashboard');
        }else{
            return redirect()->route('admin.login')->with('error','Something went wrong !');
        }
    }
    public function register(){
        $user = new User();
        $user->name = 'Admin';
        $user->role = 'admin';
        $user->email = 'admin@gmail.com';
        $user->password = Hash::make('admin');
        $user->save();
        return redirect()->route('admin.login')->with('success','User Created Successfully !');
    }
    public function dashboard()
{
    $subjectCount = Subject::count();
    $userRegistrations = User::count();

    return view('admin.dashboard', compact('subjectCount', 'userRegistrations'));
}

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login')->with('success','Logout Successfully !');
    }
    public function form(){
        return view('admin.form');
    }
    public function table(){
        return view('admin.table');
    }
}
