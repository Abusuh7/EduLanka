<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Primary_Grade extends Model
{
    use HasFactory;

    protected $table = 'primary_grades';
    protected $fillable = [
        "grade_name",
    ];
}
