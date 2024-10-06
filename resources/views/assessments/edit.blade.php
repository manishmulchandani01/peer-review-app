@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Assessment</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="d-flex flex-column gap-2" action="{{ route('assessments.update', $assessment->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Assessment Title (Up to 20 characters):</label>
                <input type="text" name="title" id="title" class="form-control"
                    value="{{ old('title', $assessment->title) }}">
                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="instruction">Instructions:</label>
                <textarea name="instruction" id="instruction" class="form-control">{{ old('instruction', $assessment->instruction) }}</textarea>
                @error('instruction')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="reviews">Number of Reviews (1 or above):</label>
                <input type="number" name="reviews" id="reviews" class="form-control"
                    value="{{ old('reviews', $assessment->reviews) }}">
                @error('reviews')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="max_score">Maximum Score (Between 1 and 100):</label>
                <input type="number" name="max_score" id="max_score" class="form-control"
                    value="{{ old('max_score', $assessment->max_score) }}">
                @error('max_score')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="due_date">Due Date:</label>
                <input type="datetime-local" name="due_date" id="due_date" class="form-control"
                    value="{{ old('due_date', $assessment->due_date) }}">
                @error('due_date')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="type">Review Type:</label>
                <select name="type" id="type" class="form-control">
                    <option value="">Select Type</option>
                    <option value="student-select"
                        {{ old('type', $assessment->type) == 'student-select' ? 'selected' : '' }}>Student-Select</option>
                    <option value="teacher-assign"
                        {{ old('type', $assessment->type) == 'teacher-assign' ? 'selected' : '' }}>Teacher-Assign</option>
                </select>
                @error('type')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="d-flex justify-content-start mt-3">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
@endsection
