<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendingEnrolment extends Model
{
    use HasFactory;

    protected $fillable = [
        's_number',
        'course_id',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }
}
