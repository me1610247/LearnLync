@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Assign Subjects</li>
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
                            <h3 class="card-title">Assign Subject To Class/Level</h3>
                        </div>
                    </div>

                    <form method="POST" action="{{ route('assign-teacher.store') }}" id="quickForm">
                        @csrf
                        @include('admin.message')
                        <div class="form-group col-md-4">
                            <label for="teacher_id">Teacher</label>
                            <select name="teacher_id" id="teacher_id" class="form-control">
                                <option disabled selected value="">Select Teacher</option>
                                @foreach ($teachers as $teacher)
                                    <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                @endforeach
                            </select>
                            @error('teacher_id')
                            <p class="text-danger">{{ $message }} </p>
                            @enderror
                        </div>

                        <div class="form-group col-md-4">
                            <label for="class_id">Class</label>
                            <select name="class_id" id="class_id" class="form-control">
                                <option disabled selected value="">Select Class</option>
                                @foreach ($classes as $class)
                                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                                @endforeach
                            </select>
                            @error('class_id')
                            <p class="text-danger">{{ $message }} </p>
                            @enderror
                        </div>

                        <div class="form-group col-md-4">
                            <label for="subject_id">Subject</label>
                            <select name="subject_id" id="subject_id" class="form-control">
                                <option disabled selected value="">Select Subject</option>
                                @foreach ($subjects as $subject)
                                    <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                @endforeach
                            </select>
                            @error('subject_id')
                            <p class="text-danger">{{ $message }} </p>
                            @enderror
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $('#class_id').change(function() {
        var class_id = $(this).val();
        $.ajax({
            url: "{{ route('getSubjectsByClass') }}",
            type: "get",
            data: { class_id: class_id },
            dataType: 'json',
            success: function(response) {
                $('#subject_id').find('option').not(":first").remove();
                $.each(response.subjects, function(key, item) {
                    $('#subject_id').append(`
                        <option value="${item.id}">${item.name}</option>
                    `);
                });
            },
            error: function() {
                alert("Failed to load subjects.");
            }
        });
    });
</script>
@endsection
