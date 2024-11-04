@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-3">
                <div class="col-sm-12 text-center">
                    <h1 class="text-primary">Teacher Management</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Teacher Management</li>
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
                        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                            <h3 class="card-title">Teacher List</h3>
                        </div>
                        
                        <div class="card-body">
                            @include('admin.message')
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <form method="GET" action="{{ route('teacher.search') }}" id="searchForm">
                                        <div class="input-group">
                                            <input type="text" name="search" id="searchInput" class="form-control" placeholder="Search by Teacher Name, ID ..." value="{{ request('search') }}">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-primary">Search</button>
                                                <button type="submit" class="btn btn-outline-secondary" id="clearSearch" title="Clear Search">
                                                    &times;
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <table id="academicYearTable" class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Date of Birth</th>
                                        <th>Created at</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($teachers as $teacher)
                                        <tr>
                                            <td>{{$teacher->id}}</td>
                                            <td>{{ ucwords($teacher->name) }}</td>
                                            <td>{{ $teacher->email }}</td>
                                            <td>{{ $teacher->phone }}</td>
                                            <td>{{ $teacher->dob }}</td>
                                            <td>{{ $teacher->created_at }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('teacher.edit', $teacher->id) }}" class="text-primary mx-1" title="Edit">
                                                    <i class="fas fa-edit"></i> 
                                                </a>                          
                                                <a href="{{ route('teacher.delete', $teacher->id) }}" 
                                                    class="text-danger mx-1" 
                                                    onclick="return confirm('Are you sure you want to delete this class?');" title="Delete">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>                                  
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="mt-4 d-flex justify-content-center">
                                {{ $teachers->links() }} <!-- Render pagination links -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- DataTables Script -->
@push('scripts')
<script>
    $(document).ready(function () {
        let table = $('#academicYearTable').DataTable({
            responsive: true,
            autoWidth: false,
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "pageLength": 10
        });
    });

</script>
<script>
    document.getElementById('clearSearch').addEventListener('click', function(e) {
    document.getElementById('searchInput').value = ''; // Clear the input field
    document.getElementById('searchForm').submit(); // Submit the form with an empty query
});

</script>
@endpush

@endsection