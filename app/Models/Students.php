<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;

    protected $table = 'students';
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
        "class_id",
        "grade_id",
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


}
