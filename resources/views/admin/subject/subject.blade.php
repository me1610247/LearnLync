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
                                <h3 class="card-title">Add Subject for Your Institution</h3>
                            </div>
                        </div>
 
                        <form method="POST" action="{{route('subject.store')}}" id="quickForm">
                            @csrf
                            @include('admin.message')
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Add Subject</label>
                                    <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                                        placeholder="Enter Subject Name">
                                    @error('name')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Add Code</label>
                                    <input type="text" name="code" class="form-control" id="exampleInputEmail1"
                                        placeholder="Enter Subject Code">
                                    @error('code')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Subject Type</label>
                                    <select name="type" class="form-control" id="">
                                        <option value="" disabled selected>Select Type</option>
                                        <option value="theory">Theory</option>
                                        <option value="practical">Practical</option>
                                    </select>
                                    @error('type')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="credit_hours">Credit Hours</label>
                                        <input type="number" name="credit_hours" class="form-control" id="credit_hours" 
                                                placeholder="Enter credit hours">
                                        @error('credit_hours')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="instructor">Instructor</label>
                                        <input type="text" name="instructor" class="form-control" id="instructor" 
                                       " placeholder="Enter instructor name">
                                        @error('instructor')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Add Subject</button>
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
