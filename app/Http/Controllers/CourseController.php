<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;
use App\Models\User;
use App\Models\Assessment;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        if (count($user->courses) > 0) {
            $courses = $user->courses;
        } else {
            $courses = collect();
        }

        return view('courses.index')->with('courses', $courses);
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
    public function show(string $id)
    {
        $course = Course::with(['teachers', 'assessments'])->findOrFail($id);

        $enroledStudentIds = $course->students->pluck('id')->toArray();
        $students = User::where('role', 'student')->whereNotIn('id', $enroledStudentIds)->get();

        return view('courses.show')->with('course', $course)->with('students', $students);
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

    public function enrol(Request $request, $id)
    {
        $course = Course::findOrFail($id);

        if (auth()->user()->role !== 'teacher') {
            return redirect()->back()->with('error', 'Unauthorised access');
        }

        $request->validate([
            'student_id' => 'required|exists:users,id'
        ]);

        $student = User::where('role', 'student')->findOrFail($request->student_id);

        $course->students()->attach($student->id);

        return redirect()->back()->with('success', 'Student enroled successfully');
    }
}
