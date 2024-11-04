@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="text-primary">Fee Structure</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Fee Structure</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card shadow-sm">
                        <div class="card-header d-flex justify-content-between align-items-center bg-light">
                            <h3 class="card-title">Fee Structure Table</h3>
                            <form method="GET" action="{{ route('fee-structure.search') }}" class="mb-3" id="searchForm">
                                <div class="input-group">
                                    <input type="text" name="search" id="searchInput" class="form-control" placeholder="Search..." value="{{ request('search') }}">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                        <button type="button" class="btn btn-outline-secondary" id="clearSearch" title="Clear Search">
                                            &times;
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-body">
                            <a href="{{ route('fee-structure.create') }}" class="btn btn-success mb-3">
                                <i class="fas fa-plus"></i> Add New Fee
                            </a>
                            @include('admin.message')
                            <div class="table-responsive">
                                <table id="feeStructureTable" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Fee Name</th>
                                            <th class="text-center">Class</th>
                                            <th class="text-center">Academic Year</th>
                                            <th class="text-center">Total Fee</th>                                           
                                            <th class="text-center">Created At</th>
                                            <th style="width: 120px;" class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($feeStrcuture as $fee)
                                            <tr>
                                                <td class="text-center">{{ $fee->feeHead->name }} Fee</td>
                                                <td class="text-center">{{ $fee->class->name }}</td>
                                                <td class="text-center">{{ $fee->academicYear->year }}</td>
                                                @foreach (['january_fee'] as $monthFee)
                                                <td class="text-center">{{ $fee->$monthFee ?? '---' }}</td>
                                                @endforeach
                                                <td class="text-center">{{ $fee->created_at->format('d-m-Y') }}</td>
                                                <td class="text-center">
                                                    <div class="btn-group" role="group">
                                                        <a href="{{ route('fee-structure.edit', $fee->id) }}" class="btn btn-sm btn-primary" title="Edit">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <a href="{{ route('fee-structure.delete', $fee->id) }}" class="btn btn-sm btn-danger mx-3" title="Delete" onclick="return confirm('Are you sure you want to delete this fee structure?');">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="mt-4 d-flex justify-content-between">
                                <div>
                                    {{ $feeStrcuture->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

<style>
    /* General Styles */
    body {
        background-color: #f4f6f9; /* Light background for the entire page */
    }

    .card {
        border-radius: 8px; /* Rounded corners for cards */
    }

    .card-header {
        background-color: #e9ecef; /* Light grey for header */
        border-bottom: 2px solid #007bff; /* Blue border for emphasis */
    }

    .card-title {
        font-weight: bold;
        color: #343a40; /* Dark text for readability */
    }

    /* Button Styles */
    .btn {
        transition: background-color 0.3s, transform 0.3s;
        margin-left: 5px; /* Add space between buttons */
    }

    .btn:hover {
        transform: scale(1.05);
    }

    .btn-outline-secondary {
        color: #6c757d; /* Bootstrap secondary color */
        border-color: #6c757d; /* Match border color */
    }

    .btn-outline-secondary:hover {
        background-color: #6c757d; /* Change background on hover */
        color: white; /* Change text color on hover */
    }

    /* Table Styles */
    table {
        width: 100%;
        margin: 20px 0;
    }

    th {
        background-color: #007bff; /* Bootstrap primary color */
        color: white;
        text-align: center;
    }

    th, td {
        padding: 12px; /* Add padding for table cells */
    }

    .text-center {
        text-align: center; /* Center align text */
    }

    /* Sticky Header */
    #feeStructureTable th:last-child,
    #feeStructureTable td:last-child {
        position: sticky;
        right: 0;
        background-color: #ffffff; /* Change as needed */
        z-index: 10; /* Make sure it's above other content */
    }
</style>