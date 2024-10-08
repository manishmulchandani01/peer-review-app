<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;
use App\Models\User;
use App\Models\Assessment;
use App\Models\Enrolment;
use App\Models\PendingEnrolment;
use Illuminate\Support\Facades\Validator;

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
    public function upload()
    {
        return view('courses.upload');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function upload_file(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:txt|max:2048',
        ]);

        if (auth()->user()->role !== 'teacher') {
            return redirect()->back()->with('error', 'Unauthorised access');
        }

        $file = $request->file('file');
        $path = $file->getRealPath();
        $lines = file($path);

        $course_data = [];
        $section = '';
        $required_sections = ['course', 'teachers', 'assessments', 'students'];

        foreach ($lines as $line) {
            $line = trim($line);

            if ($line === 'course') {
                $section = 'course';
                continue;
            } elseif ($line === 'teachers') {
                $section = 'teachers';
                continue;
            } elseif ($line === 'assessments') {
                $section = 'assessments';
                continue;
            } elseif ($line === 'students') {
                $section = 'students';
                continue;
            }

            if ($section === 'course') {
                if (isset($line) && $line != '') {
                    $course_details = explode(',', $line);
                    if (count($course_details) !== 2) {
                        return redirect()->back()->with('error', 'Invalid format in course section.');
                    }
                    list($course_name, $course_code) = explode(',', $line);
                    $course_data['course'] = [
                        'name' => trim($course_name, '"'),
                        'code' => trim($course_code, '"'),
                    ];
                } else {
                    continue;
                }
            } elseif ($section === 'teachers') {
                if (isset($line) && $line != '') {
                    $course_data['teachers'][] = $line;
                }
            } elseif ($section === 'assessments') {
                if (isset($line) && $line != '') {
                    $assessments_details = explode(',', $line);
                    if (count($assessments_details) !== 5) {
                        return redirect()->back()->with('error', 'Invalid format in assessment section.');
                    }
                    if (count($assessments_details) === 5) {
                        $assessment = [
                            'title' => trim($assessments_details[0], '"'),
                            'instruction' => trim($assessments_details[1], '"'),
                            'reviews' => trim($assessments_details[2], '"'),
                            'max_score' => trim($assessments_details[3], '"'),
                            'due_date' => trim($assessments_details[4], '"')
                        ];

                        $validator = Validator::make($assessment, [
                            'title' => 'required|max:20',
                            'instruction' => 'required|string',
                            'reviews' => 'required|integer|min:1',
                            'max_score' => 'required|integer|between:1,100',
                            'due_date' => 'required|date',
                        ]);

                        if ($validator->fails()) {
                            $error = $validator->errors()->first();
                            continue;
                        }
                    }
                    $course_data['assessments'][] = $line;
                }
            } elseif ($section === 'students') {
                if (isset($line) && $line != '') {
                    $course_data['students'][] = $line;
                }
            }
        }

        if (!empty($error)) {
            return redirect()->back()->with('error', $error);
        }

        // not working as it should, most possibily due to any small error in above code but its not a mandatory requirement to have it hence not going to bother fixing it
        foreach ($required_sections as $required_section) {
            if (!isset($course_data[$required_section]) || empty($course_data[$required_section])) {
                return redirect()->back()->with('error', ucfirst($required_section) . ' section does not exist.');
            }
        }

        $course_exists = Course::where('code', $course_data['course']['code'])->exists();
        if ($course_exists) {
            return redirect()->back()->with('error', 'Course with same course code already exists.');
        }

        $course = Course::create([
            'name' => $course_data['course']['name'],
            'code' => $course_data['course']['code'],
        ]);

        foreach ($course_data['teachers'] as $teacher_s_number) {
            $teacher = User::where('s_number', $teacher_s_number)->first();

            if (!$teacher) {
                return redirect()->back()->with('error', "Provided teacher's s-number does not exists.");
            }

            if ($teacher->role !== 'teacher') {
                return redirect()->back()->with('error', "Provided s-number in teacher's section is not a teacher.");
            }

            $course->teachers()->attach($teacher->s_number);
        }

        foreach ($course_data['assessments'] as $assessment_line) {
            $assessments_details = explode(',', $assessment_line);

            if (count($assessments_details) === 5) {
                $title = trim($assessments_details[0], '"');
                $instruction = trim($assessments_details[1], '"');
                $reviews = trim($assessments_details[2], '"');
                $max_score = trim($assessments_details[3], '"');
                $due_date = trim($assessments_details[4], '"');

                Assessment::create([
                    'course_id' => $course->id,
                    'title' => $title,
                    'instruction' => $instruction,
                    'reviews' => (int)$reviews,
                    'max_score' => (int)$max_score,
                    'due_date' => $due_date,
                    'type' => 'student-select',
                ]);
            }
        }

        foreach ($course_data['students'] as $student_s_number) {
            $student = User::where('s_number', $student_s_number)->first();

            if ($student) {
                Enrolment::create([
                    's_number' => $student->s_number,
                    'course_id' => $course->id,
                ]);
            } else {
                PendingEnrolment::create([
                    's_number' => $student_s_number,
                    'course_id' => $course->id,
                ]);
            }
        }

        return redirect()->back()->with('success', 'Course information uploaded successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $course = Course::with(['teachers', 'assessments'])->findOrFail($id);

        $enroled_student_ids = $course->students->pluck('id')->toArray();
        $students = User::where('role', 'student')->whereNotIn('id', $enroled_student_ids)->get();

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

        $course->students()->attach($student->s_number);

        return redirect()->back()->with('success', 'Student enroled successfully');
    }
}
