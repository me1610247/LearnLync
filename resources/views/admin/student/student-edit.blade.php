@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1 class="text-center">Edit Student</h1>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Student: ( {{$user->name}} ) Information For Your Institution</h3>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('student.update',$user->id) }}" id="quickForm">
                                @csrf
                                @include('admin.message')
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="class_id">Select Class</label>
                                        <select name="class" class="form-control">
                                            <option value="" disabled>Select Class</option>
                                            @foreach ($classes as $class)
                                                <option value="{{ $class->id }}" {{ $user->class_id == $class->id ? 'selected' : '' }}>{{ $class->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('class')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group col-md-4">
                                        <label for="academic_year_id">Select Academic Year</label>
                                        <select name="academic_year" class="form-control">
                                            <option value="" disabled>Select Year</option>
                                            @foreach ($academicYears as $year)
                                                <option value="{{ $year->id }}" {{ $user->academic_year_id == $year->id ? 'selected' : '' }}>{{ $year->year }}</option>
                                            @endforeach
                                        </select>
                                        @error('academic_year')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="fee_heads_id">Admission Date</label>
                                        <input type="date" value="{{ $user->admission_date }}" name="admission_date" class="form-control">
                                        @error('admission_date')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <hr>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="name">Student Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Enter Student Name" value="{{ $user->name }}">
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="email">Student Email Address</label>
                                        <input type="email" name="email" class="form-control" placeholder="Enter Student Email" value="{{ $user->email }}">
                                        @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="password">Student Password</label>
                                        <input type="text" name="password" class="form-control" placeholder="Create New Student Password">
                                        @error('password')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                   
                                    <div class="form-group col-md-4">
                                        <label for="dob">Date of Birth</label>
                                        <input type="date" name="dob" class="form-control" value="{{ $user->dob }}">
                                        @error('dob')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                  
                                    <div class="form-group col-md-4">
                                        <label for="phone">Mobile Number</label>
                                        <input type="text" name="phone" placeholder="Enter Student Phone Number" class="form-control" value="{{ $user->phone }}">
                                        @error('phone')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                             
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update Information </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
