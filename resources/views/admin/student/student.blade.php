@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1 class="text-center ">Create Student</h1>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add Students For Your Institution</h3>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('student.store') }}" id="quickForm">
                                @csrf
                                @include('admin.message')
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="class_id">Select Class</label>
                                        <select name="class" class="form-control">
                                            <option value="" disabled selected>Select Class</option>
                                            @foreach ($classes as $class)
                                                <option value="{{ $class->id }}">{{ $class->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('class')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group col-md-4">
                                        <label for="academic_year_id">Select Academic Year</label>
                                        <select name="academic_year" class="form-control">
                                            <option value="" disabled selected>Select Year</option>
                                            @foreach ($academic_year as $year)
                                                <option value="{{ $year->id }}">{{ $year->year }}</option>
                                            @endforeach
                                        </select>
                                        @error('academic_year')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="fee_heads_id">Admission Date</label>
                                        <input type="date" name="admission_date" class="form-control">
                                        @error('admission_date')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Month Fee Fields -->
                                <hr>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="">Student Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Enter Student Name">
                                        @error('name')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">Student Email Address</label>
                                        <input type="text" name="email" class="form-control" placeholder="Enter Student Email">
                                        @error('email')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">Student Password</label>
                                        <input type="text" name="password" class="form-control" placeholder="Enter Student Password">
                                        @error('password')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                    </div>
                                   
                                    <div class="form-group col-md-4">
                                        <label for="">Date of Birth</label>
                                        <input type="date" name="dob" class="form-control">
                                        @error('dob')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                  
                                    <div class="form-group col-md-4">
                                        <label for="">Mobile Number</label>
                                        <input type="number" name="phone" placeholder="Enter Student Phone Number" class="form-control">
                                        @error('phone')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                             
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Add Student</button>
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
