<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Assessment;
use App\Models\PeerReview;
use App\Models\Score;

class AssessmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request, $course_id)
    {
        $request->validate([
            'title' => 'required|max:20',
            'instruction' => 'required|string',
            'reviews' => 'required|integer|min:1',
            'max_score' => 'required|integer|between:1,100',
            'due_date' => 'required|date',
            'type' => 'required|in:student-select,teacher-assign',
        ]);

        if (auth()->user()->role !== 'teacher') {
            return redirect()->back()->with('error', 'Unauthorised access');
        }

        Assessment::create([
            'course_id' => $course_id,
            'title' => $request->title,
            'instruction' => $request->instruction,
            'reviews' => $request->reviews,
            'max_score' => $request->max_score,
            'due_date' => $request->due_date,
            'type' => $request->type,
        ]);

        return redirect()->back()->with('success', 'Assessment added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show_teacher(string $id)
    {
        $assessment = Assessment::with('course.students')->findOrFail($id);
        $all_students = $assessment->course->students;

        $students = $all_students->map(function ($student) use ($assessment) {
            $given_reviews_count = PeerReview::where('assessment_id', $assessment->id)->where('reviewer_id', $student->id)->count();

            $received_reviews_count = PeerReview::where('assessment_id', $assessment->id)->where('reviewee_id', $student->id)->count();

            $score = Score::where('assessment_id', $assessment->id)->where('student_id', $student->id)->value('score');

            return [
                'student' => $student,
                'given_reviews_count' => $given_reviews_count,
                'received_reviews_count' => $received_reviews_count,
                'score' => $score,
            ];
        });

        return view('assessments.show_teacher')->with('assessment', $assessment)->with('students', $students);
    }

    /**
     * Display the specified resource.
     */
    public function show_student(string $id)
    {
        $assessment = Assessment::with('course.students')->findOrFail($id);

        $student = Auth::user();

        $given_reviews = PeerReview::where('assessment_id', $id)->where('reviewer_id', $student->id)->get();

        $received_reviews = PeerReview::where('assessment_id', $id)->where('reviewee_id', $student->id)->get();

        $to_be_reviewed = $assessment->course->students->whereNotIn('id', $given_reviews->pluck('reviewee_id'))->whereNotIn('id', [$student->id]);

        return view('assessments.show_student')->with('assessment', $assessment)->with('given_reviews', $given_reviews)->with('received_reviews', $received_reviews)->with('to_be_reviewed', $to_be_reviewed);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $assessment = Assessment::findOrFail($id);

        $hasSubmissions = PeerReview::where('assessment_id', $id)->count() > 0;

        if ($hasSubmissions) {
            return redirect()->back()->with('error', 'Can not edit assessment as there has already been a submission');
        }

        return view('assessments.edit')->with('assessment', $assessment);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
             'title' => 'required|max:20',
             'instruction' => 'required|string',
             'reviews' => 'required|integer|min:1',
             'max_score' => 'required|integer|between:1,100',
             'due_date' => 'required|date',
             'type' => 'required|in:student-select,teacher-assign',
         ]);

        $assessment = Assessment::findOrFail($id);

        $hasSubmissions = PeerReview::where('assessment_id', $id)->count() > 0;

        if ($hasSubmissions) {
            return redirect()->back()->with('error', 'Can not edit assessment as there has already been a submission');
        }

        $assessment->update([
            'title' => $request->title,
            'instruction' => $request->instruction,
            'reviews' => $request->reviews,
            'max_score' => $request->max_score,
            'due_date' => $request->due_date,
            'type' => $request->type,
        ]);

        return redirect()->route('assessments.show_teacher', $assessment->id)->with('success', 'Assessment updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function submit_review(Request $request, string $id)
    {
        $assessment = Assessment::findOrFail($id);
        $student = Auth::user();

        $request->validate([
            'reviewee_id' => 'required|exists:users,id',
            'text' => 'required|min:5',
        ]);

        if ($student->id == $request->reviewee_id) {
            return redirect()->back()->with('error', 'You can not give review to yourself.');
        }

        $existing_review = PeerReview::where('assessment_id', $id)->where('reviewer_id', $student->id)->where('reviewee_id', $request->reviewee_id)->exists();

        if ($existing_review) {
            return redirect()->back()->with('error', 'You have already given review to this student');
        }

        PeerReview::create([
            'assessment_id' => $id,
            'reviewer_id' => $student->id,
            'reviewee_id' => $request->reviewee_id,
            'text' => $request->text,
            'score' => 1,
        ]);


        return redirect()->back()->with('success', 'Review given successfully');
    }
}
