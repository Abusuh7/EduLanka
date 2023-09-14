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
            'attendance.*.student_id' => 'required|exists:students,id',
            'attendance.*.attendance_date' => 'required|date',
            'attendance.*.status' => 'required|in:present,absent',
        ]);

        // Loop through the submitted data and save attendance records
        foreach ($request->input('attendance') as $attendanceData) {
            Attendance::create([
                'student_id' => $attendanceData['student_id'],
                'attendance_date' => $attendanceData['attendance_date'],
                'status' => $attendanceData['status'],
                // Add 'teacher_id' if needed
            ]);
        }

        // Redirect back or to a success page
        return redirect()->back()->with('success', 'Attendance recorded successfully.');
    }



    public function show($id)
    {
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

}
