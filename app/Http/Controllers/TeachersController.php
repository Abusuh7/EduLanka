<?php

namespace App\Http\Controllers;

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
    public function index()
    {
        //
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
