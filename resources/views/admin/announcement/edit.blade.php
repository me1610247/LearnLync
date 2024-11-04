@extends('admin.layout')

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
                            <li class="breadcrumb-item active">Announcement </li>
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
                                <h3 class="card-title">Edit Announcement for Your Institution</h3>
                            </div>
                        </div>
 
                        <form method="POST" action="{{route('announcement.update',$announcement->id)}}" id="quickForm">
                            @csrf
                            @include('admin.message')
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Send Message</label>
                                    <input type="text" value="{{$announcement->message}}" name="message" class="form-control" id="exampleInputEmail1"
                                        placeholder="Write Announcement Message">
                                    @error('message')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                    </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Broadcast to</label>
                                    <select name="type" class="form-control" id="">
                                        <option  disabled selected>{{$announcement->type}}</option>
                                        <option {{$announcement->type =='student' ? 'selected' :''}} value="student">Student</option>
                                        <option {{$announcement->type =='doctor' ? 'selected' :''}} value="doctor">Teacher</option>
                                    </select>
                                    @error('type')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                    </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
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
