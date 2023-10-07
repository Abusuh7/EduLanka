<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Discussion_Room_Booking;
use App\Models\Mark;
use App\Models\Students;
use App\Models\Teachers;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function adminReservationList()
    {
        //Get all the discussion room bookings for today,upcoming and past
        $discussionRoomBookingsToday = Discussion_Room_Booking::whereDate('date', today())->whereTime('end_time', '>=', now())->get();
        $discussionRoomBookingsUpcomming = Discussion_Room_Booking::whereDate('date', '>', today())->get();
        $discussionRoomBookingsPast = Discussion_Room_Booking::whereDate('date', '<', today())->get();



        //Get the booking today only with end time less than or equal to current time
        // $discussionRoomBookingsToday = Discussion_Room_Booking::where('student_id', $student_id)->whereDate('date', today())->whereTime('end_time', '>=', now())->get();
        // //Get the upcomming booking after today other than today
        // $discussionRoomBookingsUpcomming = Discussion_Room_Booking::where('student_id', $student_id)->whereDate('date', '>', today())->get();
        // //Get the past booking from today when the end time is greater than current time
        // $discussionRoomBookingsPast = Discussion_Room_Booking::where('student_id', $student_id)->whereDate('date', '<', today())->get();

        // $discussionRoomBookings = Discussion_Room_Booking::where('student_id', $student_id)->get();

        return view('admin.discussion-room.discussion-room', compact('discussionRoomBookingsToday', 'discussionRoomBookingsUpcomming', 'discussionRoomBookingsPast'));
        // return view('secondaryStudent.reservations.reservations-dashboard');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }



    public function analytics()
    {
// Retrieve user counts by month
        $userCountsByMonth = User::selectRaw('DATE_FORMAT(created_at, "%Y-%m") as month, count(*) as count')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $genderData = Students::select('gender', \DB::raw('count(*) as count'))
            ->groupBy('gender')
            ->pluck('count', 'gender')
            ->toArray();

        $teachers = Teachers::all();
        $students = Students::all();
        $attendance = Attendance::all();
        $marks = Mark::all();

        $primaryCount = Students::where('category', 'primary')->count();
        $secondaryCount = Students::where('category', 'secondary')->count();

        // Fetch student counts by grade using a join with the Grades table
        $gradeCounts = Students::join('grades', 'students.grade_id', '=', 'grades.id')
            ->select('grades.grade_name', \DB::raw('count(*) as count'))
            ->groupBy('grades.grade_name')
            ->pluck('count', 'grade_name');

        return view('admin.analytics', compact('teachers',
            'students', 'attendance', 'marks',
            'primaryCount', 'secondaryCount', 'gradeCounts', 'userCountsByMonth'
        , 'genderData'));
    }

}
