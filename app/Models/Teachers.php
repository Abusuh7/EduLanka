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
    ];
}
