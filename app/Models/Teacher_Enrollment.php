<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher_Enrollment extends Model
{
    use HasFactory;

    protected $table = 'teacher_enrollments';
    protected $fillable = [
        "enroll_date",
    ];
}
