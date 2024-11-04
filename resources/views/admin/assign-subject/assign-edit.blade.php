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
                            <li class="breadcrumb-item active">Update Assign Subjects</li>
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
                           
                        <form method="POST" action="{{ route('assign.update', $classId) }}" id="quickForm">
                            @csrf
                            @method('PUT')
                            @include('admin.message')
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1">Class</label>
                                    <select name="class" id="" class="form-control" disabled>
                                        <option value="{{$classId}}">{{$classes->find($classId)->name}}</option>
                                    </select>
                                    @error('class')
                                    <p class="text-danger">{{ $message }} </p>
                                     @enderror
                                </div>
                               @foreach ($subjects as $subject)
                                    <div class="form-check">
                                        <input type="checkbox" name="subject[]" value="{{ $subject->id }}" id="subject-{{ $subject->id }}"
                                            {{ in_array($subject->id, $assignments) ? 'checked' : '' }}>
                                        <label for="subject-{{ $subject->id }}">{{ $subject->name }}</label>
                                    </div>
                               @endforeach
                               @error('subject')
                               <p class="text-danger">{{ $message }} </p>
                                @enderror
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
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
