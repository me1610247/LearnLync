@extends('admin.layout')

@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="text-dark">Subject Management</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-secondary">Home</a></li>
                            <li class="breadcrumb-item active">Subject</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row mb-4">
                    <div class="col-md-6">
                        <form method="GET" action="{{ route('subject.search') }}" id="searchForm">
                            <div class="input-group">
                                <input type="text" name="search" id="searchInput" class="form-control" placeholder="Search by Subject Name, Code, or Type ..." value="{{ request('search') }}">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                    <button type="button" class="btn btn-outline-secondary" id="clearSearch" title="Clear Search">
                                        &times;
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow-sm rounded">
                            <div class="card-header bg-primary text-white">
                                <h3 class="card-title">Subjects List</h3>
                            </div>
                            <div class="card-body">
                                @include('admin.message')
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Name</th>
                                            <th>Code</th>
                                            <th>Type</th>
                                            <th>Created at</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($subjects as $subject)
                                            <tr>
                                                <td>{{ ucfirst($subject->name) }}</td>
                                                <td>{{ $subject->code }}</td>
                                                <td>{{ $subject->type }}</td>
                                                <td>{{ $subject->created_at->format('Y-m-d H:i:s') }}</td>
                                                <td>
                                                    <a class="text-primary" href="{{ route('subject.edit', $subject->id) }}" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a class="text-danger mx-4" href="{{ route('subject.delete', $subject->id) }}" title="Delete" onclick="return confirm('Are you sure you want to delete this subject?');">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="mt-4">
                                    {{ $subjects->links() }} <!-- This will render the pagination links -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <style>
        /* Card and table styling */
        .card {
            border: none;
            border-radius: 10px;
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            border-bottom: 2px solid #007bff;
            font-size: 1.25rem;
        }

        .breadcrumb-item a {
            text-decoration: none;
            color: #007bff;
        }

        .breadcrumb-item.active {
            color: #6c757d;
        }

        /* Search bar styling */
        #searchInput {
            border-radius: 0;
        }

        .input-group .btn {
            border-radius: 0;
        }

        .input-group .btn-outline-secondary {
            border-color: #ced4da;
            color: #6c757d;
        }

        .input-group .btn-outline-secondary:hover {
            color: #ffffff;
            background-color: #6c757d;
        }

        /* Hover effect on table rows */
        table {
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        tbody tr:hover {
            background-color: #f1f1f1;
        }
    </style>

    <script>
        document.getElementById('clearSearch').addEventListener('click', function() {
            document.getElementById('searchInput').value = '';
            document.getElementById('searchForm').submit();
        });
    </script>
@endsection
