@extends('student.layout')

@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Change Password</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12">

                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Change Password</h3>
                            </div>
                        </div>
 
                        <form method="POST" action="{{route('student.updatePassword')}}" id="quickForm">
                            @csrf
                            @include('admin.message')
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Current Password</label>
                                    <input type="password" name="old_password" class="form-control" id="exampleInputEmail1"
                                        placeholder="Enter Your Current Password">
                                    @error('old_password')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                    </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">New Password</label>
                                    <input type="password" name="new_password" class="form-control" id="exampleInputEmail1"
                                        placeholder="Enter New Password">
                                    @error('new_password')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                    </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Confirm New Password</label>
                                    <input type="password" name="confirm_password" class="form-control" id="exampleInputEmail1"
                                        placeholder="Confirm New Password">
                                    @error('confirm_password')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                    </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>


                    <div class="col-md-6">
                    </div>

                </div>

            </div>
        </section>

    </div>
@endsection
