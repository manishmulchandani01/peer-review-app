<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'title',
        'instruction',
        'reviews',
        'max_score',
        'due_date',
        'type',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function peerReviews()
    {
        return $this->hasMany(PeerReview::class);
    }

    public function groupAssignments()
    {
        return $this->hasMany(GroupAssignment::class);
    }
}
