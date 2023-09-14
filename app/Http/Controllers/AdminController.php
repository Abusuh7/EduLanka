<?php

namespace App\Http\Controllers;

use App\Models\Discussion_Room_Booking;
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
}