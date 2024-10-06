@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">{{ $course->name }} ({{ $course->code }})</h1>

        <h2>Teachers</h2>
        @if ($course->teachers->isEmpty())
            <div class="alert alert-info" role="alert">
                No teachers teaching this course.
            </div>
        @else
            <ul class="list-group mb-4">
                @foreach ($course->teachers as $teacher)
                    <li class="list-group-item">{{ $teacher->name }}</li>
                @endforeach
            </ul>
        @endif

        <h2>Assessments</h2>
        @if ($course->assessments->isEmpty())
            <div class="alert alert-info" role="alert">
                No assessments
            </div>
        @else
            <div class="list-group mb-4">
                @foreach ($course->assessments as $assessment)
                    <a class="list-group-item list-group-item-action"
                        href="{{ auth()->user()->role === 'teacher' ? route('assessments.show_teacher', $assessment->id) : route('assessments.show_student', $assessment->id) }}">
                        <h5 class="mb-1">{{ $assessment->title }}</h5>
                        <small>Due: {{ $assessment->due_date->format('d M y, h:i A') }}</small>
                    </a>
                @endforeach
            </div>
        @endif


        @if (auth()->user()->role === 'teacher')
            <h2>Enrol Student</h2>
            <form class="mb-4" action="{{ route('courses.enrol', $course->id) }}" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label for="student_id">Select student to enroll:</label>
                    <select name="student_id" id="student_id" class="form-control">
                        <option value="">Select Student</option>
                        @foreach ($students as $student)
                            <option value="{{ $student->id }}">{{ $student->name }}</option>
                        @endforeach
                    </select>
                    @error('student_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Enrol Student</button>
            </form>

            <h2>Add Assessment</h2>

            <form action="{{ route('assessments.store', $course->id) }}" method="POST" class="d-flex flex-column gap-2">
                @csrf
                <div class="form-group">
                    <label for="title">Assessment Title (Up to 20 characters):</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}">
                    @error('title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="instruction">Instructions:</label>
                    <textarea name="instruction" id="instruction" class="form-control">{{ old('instruction') }}</textarea>
                    @error('instruction')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="reviews">Number of Reviews (1 or above):</label>
                    <input type="number" name="reviews" id="reviews" class="form-control" value="{{ old('reviews') }}">
                    @error('reviews')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="max_score">Maximum Score (Between 1 and 100):</label>
                    <input type="number" name="max_score" id="max_score" class="form-control"
                        value="{{ old('max_score') }}">
                    @error('max_score')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="due_date">Due Date:</label>
                    <input type="datetime-local" name="due_date" id="due_date" class="form-control"
                        value="{{ old('due_date') }}">
                    @error('due_date')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="type">Review Type:</label>
                    <select name="type" id="type" class="form-control">
                        <option value="">Select Type</option>
                        <option value="student-select" {{ old('type') == 'student-select' ? 'selected' : '' }}>
                            Student-Select</option>
                        <option value="teacher-assign" {{ old('type') == 'teacher-assign' ? 'selected' : '' }}>
                            Teacher-Assign</option>
                    </select>
                    @error('type')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="d-flex justify-content-start mt-3">
                    <button type="submit" class="btn btn-primary">Add Assessment</button>
                </div>
            </form>
        @endif
    </div>
@endsection
