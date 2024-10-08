<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrolment extends Model
{
    use HasFactory;

    protected $fillable = [
        's_number',
        'course_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 's_number', 's_number');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }
}
