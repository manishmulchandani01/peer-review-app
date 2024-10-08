<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Assessment;
use App\Models\PeerReview;
use App\Models\GroupAssignment;
use App\Models\Score;
use App\Models\User;

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
            'group_size' => 'nullable|required_if:type,teacher-assign|integer|min:2'
        ]);

        if (auth()->user()->role !== 'teacher') {
            return redirect("/")->with('error', 'Unauthorised access');
        }

        $user = User::findOrFail(Auth::user()->id);

        if (!$user->courses()->where('course_id', $course_id)->exists()) {
            return redirect("/")->with('error', 'Unauthorised access.');
        }

        $assessment = Assessment::create([
            'course_id' => $course_id,
            'title' => $request->title,
            'instruction' => $request->instruction,
            'reviews' => $request->reviews,
            'max_score' => $request->max_score,
            'due_date' => $request->due_date,
            'type' => $request->type,
        ]);

        $group_size = $request->input('group_size');

        if ($request->type === 'teacher-assign') {
            $this->group_assignments($assessment, $group_size);
        }

        return redirect()->back()->with('success', 'Assessment added successfully');
    }

    private function group_assignments(Assessment $assessment, $group_size)
    {
        GroupAssignment::where('assessment_id', $assessment->id)->delete();

        $students = $assessment->course->students;
        $g_number = 1;
        $counter = 0;
        $random_assigned_students = $students->shuffle();

        foreach ($random_assigned_students as $student) {
            GroupAssignment::create([
                'assessment_id' => $assessment->id,
                'g_number' => $g_number,
                'student_id' => $student->id,
            ]);

            $counter++;

            if ($counter % $group_size === 0) {
                $g_number++;
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show_teacher(string $id)
    {
        $assessment = Assessment::with('course.students')->findOrFail($id);

        $user = Auth::user();
        if ($user->role !== 'teacher' || !$user->courses()->where('course_id', $assessment->course_id)->exists()) {
            return redirect("/")->with('error', 'Unauthorised access.');
        }

        $students = $assessment->course->students()->paginate(10);

        foreach ($students as $student) {
            $student->given_reviews_count = PeerReview::where('assessment_id', $assessment->id)->where('reviewer_id', $student->id)->count();

            $student->received_reviews_count = PeerReview::where('assessment_id', $assessment->id)->where('reviewee_id', $student->id)->count();

            $student->score = Score::where('assessment_id', $assessment->id)->where('student_id', $student->id)->value('score');
        }

        return view('assessments.show_teacher')->with('assessment', $assessment)->with('students', $students);
    }

    /**
     * Display the specified resource.
     */
    public function show_student(string $id)
    {
        $student = Auth::user();
        $assessment = Assessment::with('course.students')->findOrFail($id);

        $user = Auth::user();
        if ($user->role !== 'student' || !$user->courses()->where('course_id', $assessment->course_id)->exists()) {
            return redirect("/")->with('error', 'Unauthorised access.');
        }

        $given_reviews = PeerReview::where('assessment_id', $id)->where('reviewer_id', $student->id)->get();

        $received_reviews = PeerReview::where('assessment_id', $id)->where('reviewee_id', $student->id)->get();

        if ($assessment->type === 'teacher-assign') {
            $all_student_ids = $assessment->course->students->pluck('id');

            $group = GroupAssignment::where('assessment_id', $id)->where('student_id', $student->id)->first();

            $group_student_ids = GroupAssignment::where('assessment_id', $id)->where('g_number', $group->g_number)->whereIn('student_id', $all_student_ids)->whereNotIn('student_id', [$student->id])->pluck('student_id');

            $to_be_reviewed = $assessment->course->students->whereIn('id', $group_student_ids)->whereNotIn('id', $given_reviews->pluck('reviewee_id'));
        } else {
            $to_be_reviewed = $assessment->course->students->whereNotIn('id', $given_reviews->pluck('reviewee_id'))->whereNotIn('id', [$student->id]);
        }

        return view('assessments.show_student')->with('assessment', $assessment)->with('given_reviews', $given_reviews)->with('received_reviews', $received_reviews)->with('to_be_reviewed', $to_be_reviewed);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $assessment = Assessment::findOrFail($id);

        $user = Auth::user();
        if ($user->role !== 'teacher' || !$user->courses()->where('course_id', $assessment->course_id)->exists()) {
            return redirect("/")->with('error', 'Unauthorised access.');
        }

        $has_submissions = PeerReview::where('assessment_id', $id)->count() > 0;

        if ($has_submissions) {
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
             'group_size' => 'nullable|integer|min:2'
         ]);

        $assessment = Assessment::findOrFail($id);

        $user = Auth::user();
        if ($user->role !== 'teacher' || !$user->courses()->where('course_id', $assessment->course_id)->exists()) {
            return redirect("/")->with('error', 'Unauthorised access.');
        }

        $has_submissions = PeerReview::where('assessment_id', $id)->count() > 0;

        if ($has_submissions) {
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

        $group_size = $request->input('group_size');

        if ($request->type === 'teacher-assign' && !empty($request->group_size)) {
            $this->group_assignments($assessment, $group_size);
        } elseif ($request->type === 'student-select') {
            GroupAssignment::where('assessment_id', $id)->delete();
        }

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

        if ($assessment->type === 'teacher-assign') {
            $reviewers_group = GroupAssignment::where('assessment_id', $id)->where('student_id', $student->id)->first();
            $reviewees_group = GroupAssignment::where('assessment_id', $id)->where('student_id', $request->reviewee_id)->first();

            if (!$reviewers_group || !$reviewees_group || $reviewers_group->g_number !== $reviewees_group->g_number) {
                return redirect()->back()->with('error', 'You can only review students in your assigned group.');
            }
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
        ]);

        return redirect()->back()->with('success', 'Review given successfully');
    }
}
