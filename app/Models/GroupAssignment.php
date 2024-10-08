<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupAssignment extends Model
{
    use HasFactory;

    protected $fillable = [
        'assessment_id',
        'group_number',
        'student_id',
    ];

    public function assessment()
    {
        return $this->belongsTo(Assessment::class, 'assessment_id');
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }
}
