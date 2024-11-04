@extends('admin.layout')

@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="text-dark">Academic Year</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-secondary">Home</a></li>
                            <li class="breadcrumb-item active">Announcements</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow-sm rounded">
                            <div class="card-header bg-primary text-white">
                                <h3 class="card-title">Announcements List</h3>
                            </div>
                            @include('admin.message')
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead class="table-light">
                                        <tr>
                                            <th>ID</th>
                                            <th>Broadcast to</th>
                                            <th>Message</th>
                                            <th>Created at</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($announcements as $announcement)
                                            <tr>
                                                <td>{{ $announcement->id }}</td>
                                                <td>{{ ucfirst($announcement->type) }}</td>
                                                <td>{{ $announcement->message }}</td>
                                                <td>{{ $announcement->created_at->format('Y-m-d H:i:s') }}</td>
                                                <td>
                                                    <a class="text-primary" href="{{ route('announcement.edit', $announcement->id) }}" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a class="text-danger mx-4" href="{{ route('announcement.delete', $announcement->id) }}" title="Delete" onclick="return confirm('Are you sure you want to delete this announcement?');">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="mt-4">
                                    {{ $announcements->links() }} <!-- This will render the pagination links -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <style>
        /* Custom styles for the card */
        .card {
            border: none;
            border-radius: 10px;
        }

        .card-header {
            border-bottom: 2px solid #007bff;
        }

        table {
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        tbody tr:hover {
            background-color: #f1f1f1; /* Highlight on hover */
        }

        .breadcrumb-item a {
            text-decoration: none;
            color: #007bff; /* Link color */
        }

        .breadcrumb-item.active {
            color: #6c757d; /* Active breadcrumb color */
        }
    </style>
@endsection
