<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student_Grade extends Model
{
    use HasFactory;

    protected $table = 'student_grade';
    protected $fillable = [
        "student_id",
        "grade_id",
        "class_id",
    ];

    public function students()
    {
        return $this->belongsTo(Students::class);
    }

    public function classes()
    {
        return $this->belongsTo(Classes::class);
    }

    public function grades()
    {
        return $this->belongsTo(Grades::class);
    }
}
