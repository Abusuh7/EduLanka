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
use Illuminate\Support\Facades\Hash as FacadesHash;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

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
            'password' => FacadesHash::make('aaAA12!@'),
            //pass the category to the role
            'role' => $validatedData['category'],

        ]);

        // reload to the same page
        return redirect()->back()->with('success', 'Student created successfully.');
        // ...


        // Return a response or redirect to a success page
        // ...
    }

    //deactivate function which takes the student id as a parameter and deactivate the student
    public function deactivate($id)
    {
        //find the student by id
        $user = User::find($id);
        //update the status to 0
        $user->status = 'deactivated';
        //save the student
        $user->save();
        //redirect to the same page
        return redirect()->back()->with('success', 'Student deactivated successfully.');
    }

    //activate function which takes the student id as a parameter and activate the student
    public function activate($id)
    {
        //find the student by id
        $user = User::find($id);
        //update the status to 1
        $user->status = 'activated';
        //save the student
        $user->save();
        //redirect to the same page
        return redirect()->back()->with('success', 'Student activated successfully.');
    }

    /**
     * Display the student details from users table and student table using the foreign key student_id
     */
    public function showStudentProfile($id)
    {
        //find the student by id
        $users = User::find($id);
        //Get the student id from the student table and find the student details from the student table
        $students = Students::find($users->student_id);

        //Get the student id from the student table and find the parent details and enrollment details from the parent details and enrollment table
        $parents = Parents_Details::find($students->parent_id);
        $enrollments = Student_Enrollment::find($students->enroll_id);


        $studentGrades = Student_Grade::find($users->student_id);
        //Get the student grade id from the student grade table and find the grade and class from the grades and classes table
        $grades = Grades::find($studentGrades->grade_id);
        $classes = Classes::find($studentGrades->class_id);

        //return the view with the student details
        return view('admin.student-profile', compact('users', 'students', 'parents', 'enrollments', 'grades', 'classes'));
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

    }
}
