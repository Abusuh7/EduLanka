<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Primary_Student_Grade extends Model
{
    use HasFactory;

    protected $table = 'primary_student_grade';
    protected $fillable = [
        "student_id",
        "grade_id",
        "class_id",
    ];

    public function primary_students()
    {
        return $this->belongsTo(Primary_Students::class);
    }

    public function primary_class()
    {
        return $this->belongsTo(Primary_Class::class);
    }

    public function primary_grade()
    {
        return $this->belongsTo(Primary_Grade::class);
    }
}
