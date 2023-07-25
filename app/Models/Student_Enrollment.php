<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student_Enrollment extends Model
{
    use HasFactory;

    protected $table = 'student_enrollment';
    protected $fillable = [
        // "student_id",
        "enroll_date",
    ];

    // public function primary_students()
    // {
    //     return $this->hasMany(Primary_Students::class);
    // }
}
