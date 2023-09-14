<?php

namespace App\Http\Controllers;

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

    public function store(Request $request)
    {

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
