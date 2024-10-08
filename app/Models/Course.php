<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
    ];

    public function assessments()
    {
        return $this->hasMany(Assessment::class);
    }

    public function students()
    {
        return $this->belongsToMany(User::class, 'enrolments', 'course_id', 's_number', 'id', 's_number')->where('users.role', 'student');
    }

    public function teachers()
    {
        return $this->belongsToMany(User::class, 'enrolments', 'course_id', 's_number', 'id', 's_number')->where('users.role', 'teacher');
    }

    public function pending_enrolments()
    {
        return $this->hasMany(PendingEnrolment::class, 'course_id', 'id');
    }
}
