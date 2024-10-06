@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="mb-4">{{ $assessment->title }}</h1>
            @if (auth()->user()->role === 'teacher')
                <a href="{{ route('assessments.edit', $assessment->id) }}" class="btn btn-primary">Edit</a>
            @endif
        </div>

        <div class="card mb-4">
            <div class="card-body">
                <p><strong>Due date:</strong> {{ $assessment->due_date->format('d M y, h:i A') }}</p>
                <p><strong>Instructions:</strong> {{ $assessment->instruction }}</p>
                <p><strong>Number of required reviews:</strong> {{ $assessment->reviews }}</p>
                <p><strong>Max Score:</strong> {{ $assessment->max_score }} pts</p>
            </div>
        </div>

        <h2 class="mb-4">List of all students</h2>
        <div class="list-group">
        </div>

        @if ($students->isEmpty())
            <div class="alert alert-info" role="alert">
                No students are enroled in this course.
            </div>
        @else
            <div class="list-group">
                @foreach ($students as $student)
                    <a href="{{ route('reviews.index', [$assessment->id, $student->id]) }}"
                        class="list-group-item list-group-item-action">
                        <h5 class="mb-1">{{ $student->name }}</h5>
                        <div>
                            <small>Given Reviews: {{ $student->given_reviews_count }}</small>
                        </div>
                        <div>
                            <small>Received Reviews: {{ $student->received_reviews_count }}</small>
                        </div>
                        <div>
                            <small>Score: {{ $student->score ? $student->score . ' pts' : 'Unassigned' }}</small>
                        </div>
                    </a>
                @endforeach
            </div>

            <div class="mt-4">
                {{ $students->links() }}
            </div>
        @endif
    </div>
@endsection
