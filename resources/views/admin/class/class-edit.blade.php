@extends('admin.layout')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6"></div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Validation</li>
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
                                <h3 class="card-title">General Form</h3>
                            </div>
                        </div>

                        <form class="col-md-6" method="POST" action="{{ route('class.update', $req->id) }}" id="quickForm">
                            @csrf
                            <input type="hidden" name="id" id="id" value="{{ $req->id }}">
                            @include('admin.message')

                            <div class="form-group">
                                <label for="exampleInputEmail1">Class</label>
                                <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                                       placeholder="Enter Academic Year" value="{{ old('name', $req->name) }}">
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update Class</button>
                            </div>
                        </form>
                    </div>

                    <div class="col-md-6"></div>
                </div>
            </div>
        </section>
    </div>
@endsection
