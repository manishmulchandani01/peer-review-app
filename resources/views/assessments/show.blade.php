@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">{{ $assessment->title }}</h1>

        <div class="card">
            <div class="card-body">
                <p><strong>Due Date:</strong> {{ $assessment->due_date }}</p>
                <p><strong>Instructions:</strong> {{ $assessment->instruction }}</p>
            </div>
        </div>
    </div>
@endsection
