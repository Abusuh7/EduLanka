<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Grades;
use App\Models\Parents_Details;
use App\Models\Student_Enrollment;
use App\Models\Student_Grade;
use App\Models\Students;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //display all students/ primary only and secondary only
        $students = Students::all();
        $users = User::all();
        return view('admin.users', compact('students', 'users'));

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
        // Validate the form data, including the parent and enrollment details
        $validatedData = $request->validate([
            'fname' => 'required|string',
            'lname' => 'required|string',
            'dob' => 'required|date',
            'gender' => 'required|string',
            'category' => 'required|string',
            'grade' => 'required|integer|min:1|max:12',
            'class' => 'required|string',
            'parent_fname' => 'required|string',
            'parent_lname' => 'required|string',
            'parent_email' => 'required|email',
            'parent_phone' => 'required|string',
            'parent_address' => 'required|string',
            'parent_city' => 'required|string',
            'parent_state' => 'required|string',
            'parent_zip' => 'required|string',
            'parent_country' => 'required|string',
            'enroll_date' => 'required|date',
        ]);

        // Create the grade record
        $grade = Grades::create([
            'grade_name' => $validatedData['grade'],
        ]);

        // Add the grade_id to the validated data before creating the primary student record
        $validatedData['grade_id'] = $grade->id;

        $class = Classes::create([
            'class_name' => $validatedData['class'],
        ]);

        // Add the class_id to the validated data before creating the primary student record
        $validatedData['class_id'] = $class->id;



        // Create the parent details record and set the student_id
        $parentDetails = Parents_Details::create([
            'fname' => $validatedData['parent_fname'],
            'lname' => $validatedData['parent_lname'],
            'email' => $validatedData['parent_email'],
            'phone' => $validatedData['parent_phone'],
            'address' => $validatedData['parent_address'],
            'city' => $validatedData['parent_city'],
            'state' => $validatedData['parent_state'],
            'zip' => $validatedData['parent_zip'],
            'country' => $validatedData['parent_country'],
            // 'student_id' => $primaryStudent->id,
        ]);

        // Create the enrollment record and set the student_id
        $enrollment = Student_Enrollment::create([
            'enroll_date' => $validatedData['enroll_date'],
            // 'student_id' => $primaryStudent->id,
        ]);

        // Create a new primary student record with the validated data
        $primaryStudent = Students::create([
            'fname' => $validatedData['fname'],
            'lname' => $validatedData['lname'],
            'dob' => $validatedData['dob'],
            'gender' => $validatedData['gender'],
            'category' => $validatedData['category'],
            'grade_id' => $validatedData['grade_id'],
            'class_id' => $validatedData['class_id'],
            'parent_id' => $parentDetails->id,
            'enroll_id' => $enrollment->id,
        ]);

        // Create the primary student grade record and set the student_id
        $primaryStudentGrade = Student_Grade::create([
            'grade_id' => $validatedData['grade_id'],
            'class_id' => $validatedData['class_id'],
            'student_id' => $primaryStudent->id,
        ]);


        $primaryStudentCredentials = User::create([
            // 'username' => 'CB' . $primaryStudent->id, // For example: CB1, CB2, ...
            // //create a default password as aaAA12!@
            // 'password' => Hash::make('aaAA12!@'),
            // // 'password' => bcrypt('password'), // You can set a default password here or let users change it later.
            'student_id' => $primaryStudent->id,
            'name' => $validatedData['fname'] . ' ' . $validatedData['lname'],
            //create a custom mail starting with (cb + id)@gmail.com
            'email' => 'cb' . $primaryStudent->id . '@students.edulanka.lk',
            //default password as aaAA12!@
            'password' => Hash::make('aaAA12!@'),
            //pass the category to the role
            'role' => $validatedData['category'],

        ]);

        // reload to the same page
        return redirect()->back()->with('success', 'Student created successfully.');
        // ...


        // Return a response or redirect to a success page
        // ...
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
