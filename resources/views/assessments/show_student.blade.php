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

        <h1 class="mb-4">{{ $assessment->title }}</h1>

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

        @if ($assessment->type === 'student-select')
            <h2 class="mb-4">Give Review</h2>

            @if ($given_reviews->count() >= $assessment->reviews)
                <div class="alert alert-success" role="alert">
                    You have submitted the required number of reviews for this assessment
                </div>
            @else
                <form action="{{ route('assessments.submit_review', $assessment->id) }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="reviewee_id" class="form-label">Select student to review:</label>
                        <select name="reviewee_id" id="reviewee_id" class="form-control">
                            <option value="">Select Student</option>
                            @foreach ($to_be_reviewed as $reviewee)
                                <option value="{{ $reviewee->id }}"
                                    {{ old('reviewee_id') == $reviewee->id ? 'selected' : '' }}>{{ $reviewee->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('reviewee_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="text" class="form-label">Your review (Minimum 5 words):</label>
                        <textarea name="text" id="text" class="form-control" rows="3">{{ old('text') }}</textarea>
                        @error('text')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            @endif
        @endif

        <h2 class="my-4">Received Reviews</h2>
        @if ($received_reviews->isEmpty())
            <div class="alert alert-info" role="alert">
                No received reviews yet
            </div>
        @else
            <ul class="list-group">
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

    </div>
@endsection
