<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parents_Details extends Model
{
    use HasFactory;

    protected $table = 'parents_details';
    protected $fillable = [
        "fname",
        "lname",
        "email",
        "phone",
        "address",
        "city",
        "state",
        "zip",
        "country",
        // "student_id",
    ];

    // public function primary_students()
    // {
    //     return $this->hasMany(Primary_Students::class, 'student_id');
    // }

}
