<!-- resources/views/admin/profile.blade.php -->

@extends('admin.layout')

@section('content')
<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-8">
                    <h1 class="text-center">Admin Profile</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.profile.update') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" value="{{Auth::guard('admin')->user()->name}}" required>
        </div>
        
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" value="{{Auth::guard('admin')->user()->email}}" required>
        </div>

        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" name="phone" value="{{Auth::guard('admin')->user()->phone}}">
        </div>
        <div class="form-group">
            <label for="phone">Role</label>
            <input type="text" class="form-control" name="phone" value="{{Auth::guard('admin')->user()->role}}">
        </div>
        <div class="form-group">
            <label for="phone">Date of Birth</label>
            <input type="text" class="form-control" name="phone" value="{{Auth::guard('admin')->user()->dob}}">
        </div>
        <div class="form-group">
            <label for="phone">City</label>
            <input type="text" class="form-control" name="phone" value="{{Auth::guard('admin')->user()->city}}">
        </div>

        <button type="submit" class="btn btn-primary">Update Profile</button>
    </form>
</div>
            </div>
        </div>
    </section>
</div>
@endsection
