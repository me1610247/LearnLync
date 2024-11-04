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
                            <li class="breadcrumb-item active">Subject </li>
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
                                <h3 class="card-title">Edit Subject for Your Institution</h3>
                            </div>
                        </div>
 
                        <form method="POST" action="{{route('subject.update',$subject->id)}}" id="quickForm">
                            @csrf
                                <div class="form-group">
                                    @include('admin.message')

                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" value="{{$subject->name}}" name="name" class="form-control" id="exampleInputEmail1"
                                        placeholder="Enter Subject Name">
                                    @error('name')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                    </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Code</label>
                                    <input type="text" value="{{$subject->code}}" name="code" class="form-control" id="exampleInputEmail1"
                                        placeholder="Enter Subject Code">
                                    @error('name')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                    </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Type</label>
                                    <select name="type" class="form-control" id="">
                                        <option  disabled selected>{{$subject->type}}</option>
                                        <option {{$subject->type =='theory' ? 'selected' :''}} value="theory">Theory</option>
                                        <option {{$subject->type =='practical' ? 'selected' :''}} value="practical">Practical</option>
                                    </select>
                                    @error('type')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                    </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update Subject</button>
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
