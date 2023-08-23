<?php

namespace App\Http\Controllers;

use App\Models\Discussion_Room_Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DiscussionRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function adminView()
    {
        return view('admin.discussion-room.discussion-room');
    }

    public function studentView()
    {
        return view('secondaryStudent.reservations.discussion-room');
    }


    //Create a new discussion room booking for Primary and Secomndary student
    public function studentCreate(Request $request)
    {
        $user = auth()->user();

        $validator = Validator::make($request->all(), [
            'room_name' => 'required',
            'capacity' => 'required',
            'date' => 'required',
            'start_time' => 'required',
            'end_time' => 'required|after:start_time',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $existingBookingsForUser = Discussion_Room_Booking::where('student_id', $user->student_id)
            ->where('date', $request->input('date'))
            ->count();

        if ($existingBookingsForUser > 0) {
            return redirect()->back()->withErrors(['booking_limit' => 'You cannot book more than one discussion room on the same day.']);
        }

        $existingBookingsForRoom = Discussion_Room_Booking::where('room_name', $request->input('room_name'))
            ->where('date', $request->input('date'))
            ->count();

        if ($existingBookingsForRoom > 0) {
            return redirect()->back()->withErrors(['room_booking' => 'The room is already booked for the selected day.']);
        }

        $existingBookingsForRoomAndUser = Discussion_Room_Booking::where('room_name', $request->input('room_name'))
            ->where('student_id', $user->student_id)
            ->where('date', $request->input('date'))
            ->count();

        if ($existingBookingsForRoomAndUser > 0) {
            return redirect()->back()->withErrors(['room_booking' => 'You have already booked this room for the selected day.']);
        }

        $discussionRoomBooking = Discussion_Room_Booking::create([
            'student_id' => $user->role == 'secondary' ? $user->student_id : null,
            'teacher_id' => $user->role == 'teacher' ? $user->teacher_id : null,
            'room_name' => $request->input('room_name'),
            'capacity' => $request->input('capacity'),
            'date' => $request->input('date'),
            'start_time' => $request->input('start_time'),
            'end_time' => $request->input('end_time'),
            'status' => 'pending',
        ]);

        $success = 'Discussion Room Booking Successful';

        return view('secondaryStudent.reservations.discussion-room', compact('success'));

        // return redirect()->route('studentDiscussionRoom')->with('success', 'Discussion Room Booking Successful');

        //     $validator = Validator::make($request->all(), [
        //         'room_name' => 'required',
        //         'capacity' => 'required',
        //         'date' => 'required',
        //         'start_time' => 'required',
        //         'end_time' => 'required|after:start_time',
        //     ]);

        //     if ($validator->fails()) {
        //         return redirect()->back()->withErrors($validator)->withInput();
        //     }

        //     $existingBookings = Discussion_Room_Booking::where('date', $request->input('date'))
        //         ->where(function ($query) use ($request) {
        //             $query->where('start_time', '<', $request->input('end_time'))
        //                   ->where('end_time', '>', $request->input('start_time'));
        //         })
        //         ->get();

        //     if ($existingBookings->count() > 0) {
        //         //pass a fales value to the view to display the error message wiithout redirecting
        //         return redirect()->back()->withErrors(['time_slot' => 'The room is already booked for the selected time slot']);
        //     }

        //     $discussionRoomBooking = Discussion_Room_Booking::create([
        //         // 'student_id' => auth()->user()->student_id,
        //         //if the user role is student, get the student id from the user table and store it in the discussion room booking table as student_id column else if the user is teacher, get the teacher id from the user table and store it in the discussion room booking table as teacher_id column
        //         'student_id' => auth()->user()->role == 'student' ? auth()->user()->student_id : null,
        //         'teacher_id' => auth()->user()->role == 'teacher' ? auth()->user()->teacher_id : null,
        //         'room_name' => $request->input('room_name'),
        //         'capacity' => $request->input('capacity'),
        //         'date' => $request->input('date'),
        //         'start_time' => $request->input('start_time'),
        //         'end_time' => $request->input('end_time'),
        //         'status' => 'pending',
        //     ]
        // );

        //     return redirect()->route('studentDiscussionRoom')->with('success', 'Discussion Room Booking Successful');
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
