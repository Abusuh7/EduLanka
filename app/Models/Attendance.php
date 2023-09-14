<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

// Attendance.php model
    protected $table = 'attendances'; // Specify the table name if it's different from the default naming convention

    protected $fillable = [
        'student_id',
        'attendance_date',
        'status',
        'teacher_id',
    ];

    // Attendance.php model
    public function student()
    {
        return $this->belongsTo(Students::class, 'student_id');
    }


}
