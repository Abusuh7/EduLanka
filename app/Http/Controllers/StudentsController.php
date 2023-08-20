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
        // This to ensure the admin dashboard in the nav bar is clicked displays to count of the students and teachers
        // Get all the primary students count
        $students = User::where('role', 'primary')->get();
        $primaryStudentCount = $students->count();

        // get all the secondary students count
        $secondaryStudents = User::where('role', 'secondary')->get();
        $secondaryStudentCount = $secondaryStudents->count();

        // Get all the teachers count
        $teachers = User::where('role', 'teacher')->get();
        $teacherCount = $teachers->count();

        // Get the total number of primary and secondary students
        $totalStudents = $primaryStudentCount + $secondaryStudentCount;


        return view('admin.dashboard', compact('primaryStudentCount', 'secondaryStudentCount', 'teacherCount', 'totalStudents'));
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
    public function editStudentProfile(string $id)
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
        return view('admin.edit-profile.students-edit', compact('users', 'students', 'parents', 'enrollments', 'grades', 'classes'));
    }

    /**
     * Update the teacher profile details
     */
    public function updatestudentProfile(Request $request, $id)
    {
        $request->validate([
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
        ]);

        //find the student by id
        $users = User::find($id);

        //Get the student id from the student table and find the student details from the student table
        $students = Students::find($users->student_id);

        //Get the student id from the student table and find the parent details and enrollment details from the parent details and enrollment table
        $parents = Parents_Details::find($students->parent_id);

        //Get the student grade id from the student grade table and find the grade and class from the grades and classes table
        $studentGrades = Student_Grade::find($users->student_id);

        $grades = Grades::find($studentGrades->grade_id);
        $classes = Classes::find($studentGrades->class_id);

        //update the details accordingly

        //pass the fname and lname to the users table name column
        $users->name = $request->input('fname') . ' ' . $request->input('lname'); //This is a issue for teacher stuff mail

        //mail with fname and lname
        $users->email = strtolower($request->input('fname') . $request->input('lname')) . '@students.edulanka.lk';

        //pass the category to the role
        $users->role = $request->input('category');


        $students->fname = $request->input('fname');
        $students->lname = $request->input('lname');
        $students->dob = $request->input('dob');
        $students->gender = $request->input('gender');
        $students->category = $request->input('category');

        $parents->fname = $request->input('parent_fname');
        $parents->lname = $request->input('parent_lname');
        $parents->email = $request->input('parent_email');
        $parents->phone = $request->input('parent_phone');
        $parents->address = $request->input('parent_address');
        $parents->city = $request->input('parent_city');
        $parents->state = $request->input('parent_state');
        $parents->zip = $request->input('parent_zip');
        $parents->country = $request->input('parent_country');

        $grades->grade_name = $request->input('grade');
        $classes->class_name = $request->input('class');

        // $enrollments->enroll_date = $request->input('enroll_date');

        //save the details
        $parents->save();
        $students->save();
        $users->save();
        $grades->save();
        $classes->save();
        // $enrollments->save();

        //redirect to the same page
        return redirect()->back()->with('success', 'Student details updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function terminatePrompt(string $id)
    {
        //pass the user id to the view
        //find the student by id
        $users = User::find($id);
        return view('admin.prompts.terminate-prompt', compact('users'));
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


    //Rollback the terminated student and make the reason and comment to null
    public function rollback($id)
    {
        //find the student by id
        $users = User::find($id);
        //update the status to 1
        $users->status = 'activated';
        //make the reason and comment to null
        $users->reason = null;
        $users->comment = null;
        //save the student
        $users->save();
        //redirect to the same page
        return redirect()->back()->with('success', 'Student rollbacked successfully.');
    }
}
