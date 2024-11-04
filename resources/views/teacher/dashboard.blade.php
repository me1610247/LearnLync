@extends('teacher.layout')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-4">
                <div class="col-md-12 text-center">
                    <h1 class="display-4 text-primary">Teacher Dashboard</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#" class="text-primary">Home</a></li>
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
                    <div class="card text-white bg-info shadow">
                        <div class="card-body">
                            <h5 class="card-title">Grades</h5>
                            <p class="card-text">View grades for the current semester.</p>
                            <a href="#" class="btn btn-light">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-12 mb-4">
                    <div class="card text-white bg-success shadow">
                        <div class="card-body">
                            <h5 class="card-title">Quiz and Assignments</h5>
                            <p class="card-text">Check your quizes grades and progress.</p>
                            <a href="#" class="btn btn-light">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-12 mb-4">
                    <div class="card text-white bg-danger shadow">
                        <div class="card-body">
                            <h5 class="card-title">Teaching Assisstant</h5>
                            <p class="card-text">View Teaching Assisstant status.</p>
                            <a href="#" class="btn btn-light">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-12">
                    <h3 class="text-center mb-4">Your Assigned Subjects</h3>
                    <div class="row">
                                <div class="col-lg-4 col-md-6 col-12 mb-4">
                                    <div class="card border-light shadow">
                                        <div class="card-header bg-dark text-white">
                                            <h5 class="card-title">Algorithm</h5>
                                        </div>
                                        <div class="card-body">
                                            <p class="card-text">Subject Code:SC-963</p>
                                            <p class="card-text">Class: 3 , 4</p>
                                            <a href="#" class="btn btn-outline-primary">View Students</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-12 mb-4">
                                    <div class="card border-light shadow">
                                        <div class="card-header bg-dark text-white">
                                            <h5 class="card-title">Opeation System</h5>
                                        </div>
                                        <div class="card-body">
                                            <p class="card-text">Subject Code:O-7S9</p>
                                            <p class="card-text">Class: 3 , 4</p>
                                            <a href="#" class="btn btn-outline-primary">View Students</a>
                                        </div>
                                    </div>
                                </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<style>
    /* Custom Styles */
    .content-header {
        background: #f8f9fa; /* Light background for header */
        padding: 20px;
        border-bottom: 1px solid #dee2e6; /* Subtle border */
    }

    .breadcrumb {
        background: transparent; /* Make breadcrumb background transparent */
    }

    .card {
        border-radius: 10px; /* Rounded corners for cards */
    }

    .card-header {
        font-size: 1.25rem; /* Larger font size for card header */
    }

    .btn-light {
        background: rgba(255, 255, 255, 0.8); /* Slightly transparent white button */
        border: none; /* Remove border */
    }

    .btn-outline-primary {
        border-color: #007bff; /* Primary color for outline button */
    }

    .btn-outline-primary:hover {
        background-color: #007bff; /* Change background on hover */
        color: white; /* Change text color on hover */
    }

    .shadow {
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); /* Subtle shadow for cards */
    }

    .text-primary {
        color: #007bff; /* Bootstrap primary color */
    }

    .text-secondary {
        color: #6c757d; /* Bootstrap secondary color */
    }
</style>
@endsection