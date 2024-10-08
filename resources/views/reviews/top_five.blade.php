@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Top Five Reviewers</h1>

        @if ($top_five->isEmpty())
            <p>No reviewers have been rated yet.</p>
        @else
            <ul class="list-group">
                @foreach ($top_five as $reviewer)
                    <li class="list-group-item">
                        <div>
                            <h5>{{ $reviewer->reviewer->name }}</h5>
                            <p>Average Rating: {{ number_format($reviewer->avg_rating, 2) }} / 5</p>
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
