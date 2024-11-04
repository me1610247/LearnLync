@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1 class="text-center ">Create Teacher</h1>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add Teachers For Your Institution</h3>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('teacher.store') }}" id="quickForm">
                                @csrf
                                @include('admin.message')
                                <div class="row">
                                <hr>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="">Teacher Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Enter Teacher Name">
                                        @error('name')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">Teacher Email Address</label>
                                        <input type="text" name="email" class="form-control" placeholder="Enter Teacher Email">
                                        @error('email')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                    </div> 
                                    
                                    <div class="form-group col-md-4">
                                        <label for="">Teacher Password</label>
                                        <input type="text" name="password" class="form-control" placeholder="Enter Teacher Password">
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
                                        <input type="number" name="phone" placeholder="Enter Teacher Phone Number" class="form-control">
                                        @error('phone')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                             
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Add Teacher</button>
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
