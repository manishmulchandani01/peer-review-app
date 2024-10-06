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
        return $this->belongsToMany(User::class, 'enrolments')->where('users.role', 'student');
    }

    public function teachers()
    {
        return $this->belongsToMany(User::class, 'enrolments')->where('users.role', 'teacher');
    }
}
