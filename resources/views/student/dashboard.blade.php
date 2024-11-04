@extends('student.layout')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-4">
                <div class="col-md-12 text-center">
                    <h1 class="display-4">Student Dashboard</h1>
                </div>
                <div class="col-md-12">
                    @foreach ($announcement as $item)
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Announcement:</strong> {{ $item->message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-12 mb-4">
                    <div class="card text-white bg-info">
                        <div class="card-body">
                            <h5 class="card-title">Grades</h5>
                            <p class="card-text">View your grades for the current semester.</p>
                            <a href="#" class="btn btn-light">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-12 mb-4">
                    <div class="card text-white bg-success">
                        <div class="card-body">
                            <h5 class="card-title">GPA</h5>
                            <p class="card-text">Check your cumulative GPA and progress.</p>
                            <a href="#" class="btn btn-light">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-12 mb-4">
                    <div class="card text-white bg-danger">
                        <div class="card-body">
                            <h5 class="card-title">Payment</h5>
                            <p class="card-text">View your payment status and history.</p>
                            <a href="#" class="btn btn-light">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section for Assigned Subjects -->
            <div class="row mt-4">
                <div class="col-md-12">
                    <h3 class="text-center mb-4">Your Assigned Subjects</h3>
                    <div class="row">
                        @if($assignedSubjects->isEmpty())
                            <div class="col-12">
                                <div class="alert alert-info text-center" role="alert">
                                    No subjects assigned to your class.
                                </div>
                            </div>
                        @else
                        @foreach ($assignedSubjects as $assignment)
                        <div class="col-lg-4 col-md-6 col-12 mb-4">
                            <div class="card border-light shadow">
                                <div class="card-header bg-dark text-white">
                                    <h5 class="card-title d-flex justify-content-between">
                                        {{ $assignment->subject->name }}
                                       
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">Subject Code: {{ $assignment->subject->code }}</p>
                                    <p class="card-text">Credits: {{ $assignment->subject->credit_hours }}</p>
                                    <p class="card-text">Instructor: {{ $assignment->subject->instructor }}</p>
                                    <a href="#" class="btn btn-outline-primary">View Details</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>
@endsection
