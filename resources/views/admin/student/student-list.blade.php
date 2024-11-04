@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-3">
                <div class="col-sm-12 text-center">
                    <h1 class="text-primary">Student Management</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Student Management</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row mb-4">
                <form action="" method="GET" class="d-flex justify-content-between align-items-end w-100">
                    <div class="col-md-4 mb-3">
                        <label for="filterAcademicYear" class="form-label">Filter by Academic Year</label>
                        <select name="academic_year_id" class="form-control" id="filterAcademicYear">
                            <option value="" disabled selected>Select Academic Year</option>
                            @foreach ($academicYears as $academicYear)
                                <option value="{{ $academicYear->id }}" {{ $academicYear->id == request('academic_year_id') ? 'selected' : '' }}>
                                    {{ $academicYear->year }}
                                </option>
                            @endforeach
                        </select>
                    </div>                    
                    <div class="col-md-4 mb-3">
                        <label for="filterClass" class="form-label">Filter by Class</label>
                        <select name="class_id" class="form-control" id="filterClass">
                            <option value="" disabled selected>Select Class</option>
                            @foreach ($classes as $class)
                                <option value="{{ $class->id }}" {{ $class->id == request('class_id') ? 'selected' : '' }}>
                                    {{ $class->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-2 mb-3 align-self-end">
                        <button type="submit" class="btn btn-primary w-100">Filter</button>
                    </div>
                </form>
            </div>    

            <div class="row">
                <div class="col-12">
                    <div class="card shadow-sm">
                        <form method="GET" action="{{ route('student.search') }}" class="mb-3" id="searchForm">
                            <div class="input-group">
                                <input type="text" name="search" id="searchInput" class="form-control" placeholder="Search By Student Name or ID" value="{{ request('search') }}">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                    <button type="button" class="btn btn-outline-secondary" id="clearSearch" title="Clear Search">
                                        &times;
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                            <h3 class="card-title">Student List</h3>
                        </div>
                        <div class="card-body">
                            @include('admin.message')
                            <table id="academicYearTable" class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Class</th>
                                        <th>Academic Year</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>DOB</th>
                                        <th>Created at</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{$user->id}}</td>
                                            <td>{{ ucwords($user->name) }}</td>
                                            <td>{{ $user->class ? $user->class->name : 'N/A' }}</td>
                                            <td>{{ $user->academicYear ? $user->academicYear->year : 'N/A' }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->phone }}</td>
                                            <td>{{ $user->dob }}</td>
                                            <td>{{ $user->created_at }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('student.edit', $user->id) }}" class="text-primary mx-1" title="Edit">
                                                    <i class="fas fa-edit"></i> 
                                                </a>                          
                                                <a href="{{ route('student.delete', $user->id) }}" 
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
                                {{ $users->links() }} <!-- Render pagination links -->
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
    document.getElementById('clearSearch').addEventListener('click', function() {
        document.getElementById('searchInput').value = '';
        document.getElementById('searchForm').submit();
    });
</script>

</script>

</script>
@endpush

@endsection