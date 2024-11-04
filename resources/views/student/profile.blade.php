@extends('student.layout')

@section('content')
<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Your Profile</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Profile Information</h3>
                        </div>
                        <form method="POST" action="{{ route('student.profile.update') }}" id="profileForm">
                            @csrf
                            @include('admin.message')

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Full Name</label>
                                    <input readonly type="text" name="name" class="form-control" id="name" 
                                        value="{{ Auth::user()->name }}" placeholder="Enter your full name">
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="email">Email Address</label>
                                    <input readonly type="email" name="email" class="form-control" id="email" 
                                        value="{{ Auth::user()->email }}" placeholder="Enter your email">
                                    @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="phone">Phone Number</label>
                                    <input readonly type="text" name="phone" class="form-control" id="phone" 
                                        value="{{ Auth::user()->phone }}" placeholder="Enter your phone number">
                                    @error('phone')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="class_id">Class</label>
                                    <select name="class_id" class="form-control" id="class_id">
                                        @foreach ($classes as $class)
                                            <option disabled value="{{ $class->id }}" 
                                                {{ Auth::user()->class_id == $class->id ? 'selected' : '' }}>
                                                {{ $class->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('class_id')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="academic_year_id">Academic Year</label>
                                    <select name="academic_year_id" class="form-control" id="academic_year_id">
                                        @foreach ($academicYears as $academicYear)
                                            <option disabled value="{{ $academicYear->id }}" 
                                                {{ Auth::user()->academic_year_id == $academicYear->id ? 'selected' : '' }}>
                                                {{ $academicYear->year }} <!-- Adjust this if necessary -->
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('academic_year_id')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="phone">City</label>
                                    <input readonly type="text" name="phone" class="form-control" id="phone" 
                                        value="{{ Auth::user()->city }}" placeholder="Enter your phone number">
                                    @error('phone')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="phone">Date of Birth</label>
                                    <input readonly type="text" name="phone" class="form-control" id="phone" 
                                        value="{{ Auth::user()->dob }}" placeholder="Enter your phone number">
                                    @error('phone')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                        </form>
                    </div>

                </div>

                <div class="col-md-6">
                    <!-- Additional information or side content can go here -->
                </div>

            </div>

        </div>
    </section>

</div>
@endsection
