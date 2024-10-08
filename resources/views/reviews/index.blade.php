@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">All reviews by {{ $student->name }} for {{ $assessment->title }}</h1>

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

        <div class="card mb-4">
            <div class="card-body">
                <p><strong>Due date:</strong> {{ $assessment->due_date->format('d M y, h:i A') }}</p>
                <p><strong>Instructions:</strong> {{ $assessment->instruction }}</p>
                <p><strong>Number of required reviews:</strong> {{ $assessment->reviews }}</p>
                <p><strong>Max Score:</strong> {{ $assessment->max_score }} pts</p>
            </div>
        </div>

        <h2 class="mb-4">Given Reviews</h2>
        @if ($given_reviews->isEmpty())
            <div class="alert alert-info" role="alert">
                No given reviews yet
            </div>
        @else
            <ul class="list-group mb-4">
                @foreach ($given_reviews as $review)
                    <li class="list-group-item">
                        <div>
                            <strong>Reviewer:</strong> {{ $review->reviewer->name }}
                        </div>
                        <div class="mt-2">
                            <strong>Reviewee:</strong> {{ $review->reviewee->name }}
                        </div>
                        <div class="mt-2">
                            <strong>Review:</strong> {{ $review->text }}
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif

        <h2 class="mb-4">Received Reviews</h2>
        @if ($received_reviews->isEmpty())
            <div class="alert alert-info" role="alert">
                No received reviews yet
            </div>
        @else
            <ul class="list-group mb-4">
                @foreach ($received_reviews as $review)
                    <li class="list-group-item">
                        <div>
                            <strong>Reviewer:</strong> {{ $review->reviewer->name }}
                        </div>
                        <div class="mt-2">
                            <strong>Reviewee:</strong> {{ $review->reviewee->name }}
                        </div>
                        <div class="mt-2">
                            <strong>Review:</strong> {{ $review->text }}
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif

        <h2 class="mb-4">Assign/Update Score</h2>
        <form action="{{ route('scores.assign_score', [$assessment->id, $student->id]) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="score">Score:</label>
                <input type="number" name="score" id="score" class="form-control" value="{{ old('score') }}">
                @error('score')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="mt-3 btn btn-primary">Assign</button>
        </form>
    @endsection
