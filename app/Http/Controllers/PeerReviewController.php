<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PeerReview;
use App\Models\Assessment;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class PeerReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($assessment_id, $student_id)
    {
        $student = User::findOrFail($student_id);
        $assessment = Assessment::findOrFail($assessment_id);

        $given_reviews = PeerReview::where('assessment_id', $assessment->id)->where('reviewer_id', $student_id)->get();
        $received_reviews = PeerReview::where('assessment_id', $assessment->id)->where('reviewee_id', $student_id)->get();

        return view('reviews.index')->with('student', $student)->with('assessment', $assessment)->with('given_reviews', $given_reviews)->with('received_reviews', $received_reviews);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function rate(Request $request, $review_id)
    {
        $review = PeerReview::findOrFail($review_id);

        $request->validate([
            'rate' => 'required|integer|min:1|max:5',
        ]);

        $review->rating = $request->input('rate');
        $review->save();

        return redirect()->back()->with('success', 'Review rated successfully');
    }

    public function top_five_reviewers()
    {
        $top_five_reviewers = PeerReview::select('reviewer_id', DB::raw('AVG(rating) as avg_rating'))->whereNotNull('rate')->groupBy('reviewer_id')->orderByDesc('avg_rating')->take(5)->with('reviewer')->get();

        return view('reviews.top_five_reviewers')->with('top_five_reviewers', $top_five_reviewers);
    }
}
