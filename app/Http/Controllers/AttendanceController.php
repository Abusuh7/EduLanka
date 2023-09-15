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
    }

    public function update(Request $request, $id)
    {
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
