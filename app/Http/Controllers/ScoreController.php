<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Score;
use App\Models\Assessment;

class ScoreController extends Controller
{
    public function assign_score(Request $request, $assessment_id, $student_id)
    {
        $assessment = Assessment::findOrFail($assessment_id);

        $request->validate([
            'score' => 'required|integer|min:1|max:' . $assessment->max_score,
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
