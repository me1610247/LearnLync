@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <!-- Page header content here -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add Fee Structure For Your Institution</h3>
                        </div>
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form method="POST" action="{{ route('fee-structure.store') }}" id="quickForm">
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
                                        <label for="fee_heads_id">Select Fee Heads</label>
                                        <select name="fee_head_id" class="form-control">
                                            <option value="" disabled selected>Select Fee Head</option>
                                            @foreach ($fee_heads as $fee)
                                                <option value="{{ $fee->id }}">{{ $fee->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('fee_head_id')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Month Fee Fields -->
                                <hr>
                                <div class="row">
                                    @php
                                        $months = ['January'];
                                    @endphp

                                    @foreach ($months as $month)
                                        <div class="form-group col-md-4">
                                            <label for="{{ strtolower($month) }}Fee">Total Fee</label>
                                            <input type="number" name="{{ strtolower($month) }}_fee" class="form-control" id="{{ strtolower($month) }}Fee" placeholder="Enter {{ $month }} Fee">
                                        </div>
                                    @endforeach
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Add Fee Structure</button>
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
