@extends('admin.layout')

@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Fee Head</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active"></li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">DataTable with minimal features & hover style</h3>
                            </div>
                            <div class="card-body">
                                @include('admin.message')
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Fee Name</th>
                                            <th>Created at</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($fees as $fee)
                                            <tr>
                                                <td>{{ $fee->name }}</td>
                                                <td>{{ $fee->created_at }}</td>
                                                <td>
                                                    <a href="{{ route('fee-head.edit', $fee->id) }}" class="text-primary">
                                                        <i class="fas fa-edit"></i>
                                                    </a>                          
                                                    <a href="{{ route('fee-head.delete', $fee->id) }}" 
                                                        class="text-danger mx-4" 
                                                        onclick="return confirm('Are you sure you want to delete this class?');">
                                                         <i class="fas fa-trash-alt"></i>
                                                     </a>                                  
                                                                  </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="mt-4">
                                    {{ $fees->links() }} <!-- This will render the pagination links -->
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>

    </div>
@endsection
