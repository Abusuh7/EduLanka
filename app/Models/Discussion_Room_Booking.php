<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discussion_Room_Booking extends Model
{
    use HasFactory;

    protected $table = 'discussion_room_bookings';
    protected $fillable = [
        "student_id",
        "teacher_id", //added
        "room_name",
        "capacity",
        "date",
        "start_time",
        "end_time",
        "status",
    ];

    public function students()
    {
        return $this->belongsTo(Students::class, 'student_id');
    }

    public function teachers()
    {
        return $this->belongsTo(Teachers::class, 'teacher_id');
    }
}
