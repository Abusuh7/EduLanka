<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Primary_Students extends Model
{
    use HasFactory;

    protected $table = 'primary_students';
    protected $fillable = [
        "fname",
        "lname",
        "dob",
        // "email",
        "gender",
        "category",
        "grade",
        "class",
        "parent_id",
        "enroll_id",
    ];

    //check these tmr
    public function parents_details()
    {
        return $this->belongsTo(Parents_Details::class, 'parent_id');
    }

    public function student_enrollment()
    {
        return $this->belongsTo(Student_Enrollment::class, 'enroll_id');
    }

    public function primary_grade()
    {
        return $this->belongsTo(Primary_Grade::class, 'grade_id');
    }

    public function primary_class()
    {
        return $this->belongsTo(Primary_Class::class, 'class_id');
    }
}
