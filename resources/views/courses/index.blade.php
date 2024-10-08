@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">My Courses</h1>

        @if ($courses->isEmpty())
            <div class="alert alert-info" role="alert">
                You are not enroled in or teaching any courses.
            </div>
        @else
            <div class="list-group">
                @foreach ($courses as $course)
                    <a href="{{ route('courses.show', $course->id) }}" class="list-group-item list-group-item-action">
                        <h5 class="mb-1">{{ $course->name }}</h5>
                        <small>Course code: {{ $course->code }}</small>
                    </a>
                @endforeach
            </div>
        @endif
    </div>
@endsection
