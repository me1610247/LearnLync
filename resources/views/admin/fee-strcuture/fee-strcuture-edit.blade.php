@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>Edit Fee Structure</h1>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Fee Structure For Your Institution</h3>
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

                            <form method="POST" action="{{ route('fee-structure.update', $fee->id) }}" id="quickForm">
                                @csrf
                                <input type="hidden" name="id" value="{{ $fee->id }}">
                                @include('admin.message')

                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="class_id">Select Class</label>
                                        <select name="class_id" class="form-control" required>
                                            <option value="" disabled>Select Class</option>
                                            @foreach ($classes as $class)
                                                <option value="{{ $class->id }}" {{ $class->id == $fee->class_id ? 'selected' : '' }}>{{ $class->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('class_id')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="academic_year_id">Select Academic Year</label>
                                        <select name="academic_year_id" class="form-control" required>
                                            <option value="" disabled>Select Year</option>
                                            @foreach ($academic_year as $year)
                                                <option value="{{ $year->id }}" {{ $year->id == $fee->academic_year_id ? 'selected' : '' }}>{{ $year->year }}</option>
                                            @endforeach
                                        </select>
                                        @error('academic_year_id')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="fee_head_id">Select Fee Heads</label>
                                        <select name="fee_head_id" class="form-control" required>
                                            <option value="" disabled>Select Fee Head</option>
                                            @foreach ($fee_heads as $fee_head)
                                                <option value="{{ $fee_head->id }}" {{ $fee_head->id == $fee->fee_head_id ? 'selected' : '' }}>{{ $fee_head->name }}</option>
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
                                            <input type="number" name="{{ strtolower($month) }}_fee" class="form-control" id="{{ strtolower($month) }}Fee" placeholder="Enter Total Fee" value="{{ old(strtolower($month) . '_fee', $fee->{strtolower($month) . '_fee'}) }}">
                                        </div>
                                    @endforeach
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update Fee Structure</button>
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
