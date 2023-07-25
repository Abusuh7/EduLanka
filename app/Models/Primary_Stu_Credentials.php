<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Primary_Stu_Credentials extends Model
{
    use HasFactory;
    

    protected $table = 'primary_stu_credentials';
    protected $fillable = [
        "student_id",
        "username",
        "password",
    ];

    public function primary_students()
    {
        return $this->belongsTo(Primary_Students::class);
    }
}
