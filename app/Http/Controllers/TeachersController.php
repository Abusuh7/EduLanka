<?php

namespace App\Http\Controllers;

use App\Models\Banners;
use App\Models\Discussion_Room_Booking;
use App\Models\Teacher_Enrollment;
use App\Models\Teachers;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash as FacadesHash;

class TeachersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dashboard()
    {
        // Get all the banners whicxh are active and has a visibity of secondarystu or bothstu or all and compact them
        $banners = Banners::where('status', 'active')->where('visibility', 'teacher')->orWhere('visibility', 'all')->get();
        //  $banners = Banners::where('status', 'active')->get();

         // Get all the banners
         $all = Banners::all();

         return view('teacher.dashboard', compact('banners', 'all'));

    }

    public function teacherReservations()
    {
        //get the current user and get his student id then pass the discussion room bookings to the view
        $user = auth()->user();
        $teacher_id = $user->teacher_id;
        //Get the booking today only with end time less than or equal to current time
        $discussionRoomBookingsToday = Discussion_Room_Booking::where('teacher_id', $teacher_id)->whereDate('date', today())->whereTime('end_time', '>=', now())->get();
        //Get the upcomming booking after today other than today
        $discussionRoomBookingsUpcomming = Discussion_Room_Booking::where('teacher_id', $teacher_id)->whereDate('date', '>', today())->get();
        //Get the past booking from today when the end time is greater than current time
        $discussionRoomBookingsPast = Discussion_Room_Booking::where('teacher_id', $teacher_id)->whereDate('date', '<', today())->get();

        // $discussionRoomBookings = Discussion_Room_Booking::where('student_id', $student_id)->get();

        return view('teacher.reservations.reservations-dashboard', compact('discussionRoomBookingsToday', 'discussionRoomBookingsUpcomming', 'discussionRoomBookingsPast'));
        // return view('secondaryStudent.reservations.reservations-dashboard');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the teachers form data,
        $validatedData = $request->validate([
            'fname' => 'required|string',
            'lname' => 'required|string',
            'dob' => 'required|date',
            'gender' => 'required|string',
            'email' => 'required|email',
            'subject' => 'required|string',
            'phone' => 'required|string',
            'address' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'zip' => 'required|string',
            'country' => 'required|string',
            'enroll_date' => 'required|date',
        ]);

        // Create the teachers record
        $enrollment = Teacher_Enrollment::create([
            'enroll_date' => $validatedData['enroll_date'],
            // 'student_id' => $primaryStudent->id,
        ]);

        // Create a new primary student record with the validated data
        $teacher = Teachers::create([
            //create teacher
            'fname' => $validatedData['fname'],
            'lname' => $validatedData['lname'],
            'dob' => $validatedData['dob'],
            'gender' => $validatedData['gender'],
            'email' => $validatedData['email'],
            'subject' => $validatedData['subject'],
            'phone' => $validatedData['phone'],
            'address' => $validatedData['address'],
            'city' => $validatedData['city'],
            'state' => $validatedData['state'],
            'zip' => $validatedData['zip'],
            'country' => $validatedData['country'],
            'enroll_id' => $enrollment->id,

        ]);


        $primaryStudentCredentials = User::create([
            'teacher_id' => $teacher->id,
            'name' => $validatedData['fname'] . ' ' . $validatedData['lname'],
            //create a custom mail starting with (fullname in lowercase)@edulanka.lk
            'email' => strtolower($validatedData['fname'] . $validatedData['lname']) . '@stuffs.edulanka.lk',
            //default password as aaAA12!@
            'password' => FacadesHash::make('aaAA12!@'),
            //pass the category to the role as teacher
            'role' => 'teacher',


        ]);

        // reload to the same page
        return redirect()->back()->with('success', 'Student created successfully.');
        // ...


        // Return a response or redirect to a success page
        // ...

    }

    //activate function which takes the student id as a parameter and activate the teacher
    public function activate($id)
    {
        //find the teacher by id
        $teacher = User::find($id);
        //update the status to active
        $teacher->status = 'activated';
        //save the teacher
        $teacher->save();
        //redirect to the same page
        return redirect()->back()->with('success', 'Teacher Activated successfully.');
    }

    //deactivate function which takes the student id as a parameter and deactivate the teacher
    public function deactivate($id)
    {
        //find the teacher by id
        $teacher = User::find($id);
        //update the status to active
        $teacher->status = 'deactivated';
        //save the teacher
        $teacher->save();
        //redirect to the same page
        return redirect()->back()->with('success', 'Teacher Deactivated successfully.');
    }

    /**
     * Display the teacher details from user table and teacher table.
     */
    public function showTeacherDetails(string $id)
    {
        //find the teacher by id
        $teacher = User::find($id);
        //Get the teacher id from the teacher table and find the teacher details in the teacher table
        $teacherDetails = Teachers::find($teacher->teacher_id);

        //Get the teacher id from the teacher table and find the enrollment details in the enrollemtn table
        $enrollment = Teacher_Enrollment::find($teacherDetails->enroll_id);

        //return the view with teacher and teacher details
        return view('admin.teacher-profile', compact('teacher', 'teacherDetails', 'enrollment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editTeacherProfile(string $id)
    {

        //find the teacher by id
        $teacher = User::find($id);
        //Get the teacher id from the teacher table and find the teacher details in the teacher table
        $teacherDetails = Teachers::find($teacher->teacher_id);

        //Get the teacher id from the teacher table and find the enrollment details in the enrollemtn table
        $enrollment = Teacher_Enrollment::find($teacherDetails->enroll_id);

        //return the view with teacher and teacher details
        return view('admin.edit-profile.teachers-edit', compact('teacher', 'teacherDetails', 'enrollment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateTeacherProfile(Request $request, $id)
    {
        $request->validate([
            'fname' => 'required|string',
            'lname' => 'required|string',
            'dob' => 'required|date',
            'gender' => 'required|string',
            'email' => 'required|email',
            'subject' => 'required|string',
            'phone' => 'required|string',
            'address' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'zip' => 'required|string',
            'country' => 'required|string',
            'enroll_date' => 'required|date',
        ]);

        //find the teacher by id
        $teacher = User::find($id);
        //Get the teacher id from the teacher table and find the teacher details in the teacher table
        $teacherDetails = Teachers::find($teacher->teacher_id);

        //Get the teacher id from the teacher table and find the enrollment details in the enrollemtn table
        $enrollment = Teacher_Enrollment::find($teacherDetails->enroll_id);

        //update the teacher details
        $teacher->name = $request->input('fname') . ' ' . $request->input('lname');
        //mail with fname and lname
        $teacher->email = strtolower($request->input('fname') . $request->input('lname')) . '@stuffs.edulanka.lk';

        //update the teacher details
        $teacherDetails->fname = $request->input('fname');
        $teacherDetails->lname = $request->input('lname');
        $teacherDetails->dob = $request->input('dob');
        $teacherDetails->gender = $request->input('gender');
        $teacherDetails->email = $request->input('email');
        $teacherDetails->subject = $request->input('subject');
        $teacherDetails->phone = $request->input('phone');
        $teacherDetails->address = $request->input('address');
        $teacherDetails->city = $request->input('city');
        $teacherDetails->state = $request->input('state');
        $teacherDetails->zip = $request->input('zip');
        $teacherDetails->country = $request->input('country');

        //update the enrollment details
        // $enrollment->enroll_date = $request->input('enroll_date');

        //save the teacher details
        $teacherDetails->save();
        $teacher->save();
        // $enrollment->save();

        //redirect to the same page
        return redirect()->back()->with('success', 'Teacher Details Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function terminatePrompt(string $id)
    {
        $users = User::find($id);
        return view('admin.prompts.teacher-terminate', compact('users'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function terminate(Request $request, $id)
    {
        // Validations
        $request->validate([
            'reason' => 'required|string',
            'comment' => 'required|string',
        ]);

        // Find the student by id
        $users = User::find($id);

        // Make the enrollment status to 0 default
        $users->status = 'terminated';

        //pass the reason and comment to the users table make it lowercase
        $users->reason = strtolower($request->input('reason'));
        $users->comment = strtolower($request->input('comment'));


        // Save the details
        $users->save();

        // refresh the page
        return redirect()->back()->with('success', 'Student terminated successfully.');
    }

    //Rollback terminated teacher and make the reaosn and comment to null
    public function rollback($id)
    {
        //find the teacher by id
        $teacher = User::find($id);
        //update the status to active
        $teacher->status = 'activated';
        //update the reason and comment to null
        $teacher->reason = null;
        $teacher->comment = null;
        //save the teacher
        $teacher->save();
        //redirect to the same page
        return redirect()->back()->with('success', 'Teacher Activated successfully.');
    }
}
