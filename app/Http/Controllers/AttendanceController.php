<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Classes;
use App\Models\Grades;
use App\Models\Students;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{


    public function index()
    {

        $classes = Classes::all();
        $grades = Grades::all();

        $students = Students::all();

        return view('attendance.index', compact('classes', 'grades', 'students'));

    }

    public function create()
    {
    }

    public function showStudentsAttendance(Request $request)
    {
        $classId = $request->input('class_id');
        $gradeId = $request->input('grade_id');

        // Query your database to retrieve students based on $classId and $gradeId
        $students = Students::where('class_id', $classId)->where('grade_id', $gradeId)->get();

        return view('attendance.students_attendance', compact('students'));
    }

    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'global_attendance_date' => 'required|date',
            'attendance.*.student_id' => 'required|exists:students,id',
            'attendance.*.status' => 'required|in:present,absent',
        ]);

        // Get the global attendance date
        $globalAttendanceDate = $request->input('global_attendance_date');

        // Loop through the submitted data and save attendance records
        foreach ($request->input('attendance') as $attendanceData) {
            Attendance::create([
                'student_id' => $attendanceData['student_id'],
                'attendance_date' => $globalAttendanceDate, // Use the global date
                'status' => $attendanceData['status'],
                'teacher_id' => null,
                // Add 'teacher_id' if needed
            ]);
        }

        // Redirect back or to a success page
        return redirect()->back()->with('success', 'Attendance recorded successfully.');
    }




    public function show(Request $request)
    {
        $gradeId = $request->input('grade');
        $classId = $request->input('class');
        $attendanceDate = $request->input('attendance_date'); // Get the attendance date from the form

        // Query the attendance data based on grade, class, and attendance date
        $attendances = Attendance::whereHas('student', function ($query) use ($gradeId, $classId) {
            $query->where('grade_id', $gradeId)->where('class_id', $classId);
        })->where('attendance_date', $attendanceDate)->get();

        return view('attendance.show', compact('attendances'));
    }



    public function edit($id)
    {
        // Retrieve the attendance record by its ID
        $attendance = Attendance::find($id);

        // Store the grade and class information in the session
        session(['previous_grade' => $attendance->student->grade_id, 'previous_class' => $attendance->student->class_id]);

        return view('attendance.edit', compact('attendance'));
    }



    public function update(Request $request, $id)
    {
        // Validate the form data
        $request->validate([
            'attendance_date' => 'required|date',
            'status' => 'required|in:present,absent',
        ]);

        // Find the attendance record by its ID
        $attendance = Attendance::find($id);

        // Store the grade and class information in variables
        $previousGrade = $attendance->student->grade_id;
        $previousClass = $attendance->student->class_id;

        // Update the attendance record with the submitted data
        $attendance->attendance_date = $request->input('attendance_date');
        $attendance->status = $request->input('status');
        // You can add more fields to update as needed

        // Save the updated record
        $attendance->save();

        // Redirect back to the show page with the previous grade, class, and attendance_date values
        return redirect()->route('attendance.show', [
            'grade' => $previousGrade,
            'class' => $previousClass,
            'attendance_date' => $request->input('attendance_date'), // Include attendance_date
        ])->with('success', 'Attendance record updated successfully.');


    }



    public function destroy($id)
    {
    }

    public function getStudents(Request $request)
    {
        $classId = $request->input('class_id');
        $gradeId = $request->input('grade_id');

        // Query your database to retrieve students based on $classId and $gradeId
        $students = Students::where('class_id', $classId)->where('grade_id', $gradeId)->get();

        return response()->json($students);
    }

    public function view()
    {
        // Retrieve the list of grades and classes
        $grades = Grades::all();
        $classes = Classes::all();

        return view('attendance.view', compact('grades', 'classes'));
    }


}
