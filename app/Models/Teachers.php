<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teachers extends Model
{
    use HasFactory;

    protected $table = 'teachers';
    protected $fillable = [
        "fname",
        "lname",
        "dob",
        "gender",
        "email",
        "subject",
        "phone",
        "address",
        "city",
        "state",
        "zip",
        "country",
        "enroll_id",
        "class_id",
        "grade_id",
        "subject_id",
    ];

    public function teacher_enrollment()
    {
        return $this->belongsTo(Teacher_Enrollment::class, 'enroll_id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function grade()
    {
        return $this->belongsTo(Grades::class, 'grade_id');
    }

    public function class()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }


}

