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
                            <li class="breadcrumb-item active">Assign Subjects</li>
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
                                <h3 class="card-title">Assign Subject To Class/Level</h3>
                            </div>
                        </div>
                           
                        <form method="POST" action="{{route('assign.store')}}" id="quickForm">
                            @csrf
                            @include('admin.message')
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1">Class</label>
                                    <select name="class" id="" class="form-control">
                                        <option disabled selected value="">Select Class</option>
                                        @foreach ($classes as $class)
                                            <option value="{{$class->id}}">{{$class->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('class')
                                    <p class="text-danger">{{$message}} </p>
                                     @enderror
                                </div>
                               @foreach ($subjects as $subject)
                                    <div class="form-check">
                                        <input type="checkbox" name="subject[]" value="{{$subject->id}}" id="subject-{{$subject->id}}">
                                        <label for="subject-{{$subject->id}}">{{$subject->name}}</label>
                                    </div>
                               @endforeach
                               @error('subject')
                               <p class="text-danger">{{$message}} </p>
                                @enderror
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
