<?php

namespace App\Http\Controllers;
use App\Models\Score;

use Illuminate\Http\Request;

class ScoreController extends Controller
{
    public function assign_score(Request $request, $assessment_id, $student_id)
    {
        $request->validate([
            'score' => 'required|integer|between:1,100',
        ]);

        $score = Score::where('assessment_id', $assessment_id)->where('student_id', $student_id)->first();

        if ($score) {
            $score->update(['score' => $request->score]);
        } else {
            Score::create([
                'assessment_id' => $assessment_id,
                'student_id' => $student_id,
                'score' => $request->score,
            ]);
        }

        return redirect()->back()->with('success', 'Score assigned successfully');
    }
}
