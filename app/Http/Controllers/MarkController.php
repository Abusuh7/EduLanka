<?php

namespace App\Http\Controllers;

use App\Models\Grades;
use Illuminate\Http\Request;
use App\Models\Mark;

use App\Models\Classes;
use App\Models\Subject;
use App\Models\Students;
use Illuminate\Support\Facades\Auth;

class MarkController extends Controller
{
    // Display the form to input marks
    public function create()
    {
        // Retrieve necessary data for the form (grades, classes, subjects, students)
        $grades = Grades::all();
        $classes = Classes::all();
        $subjects = Subject::all();
        $students = Students::all();

        return view('marks.create', compact('grades', 'classes', 'subjects', 'students'));
    }

    // Store the submitted marks
    // Store the submitted marks
    public function store(Request $request)
    {
        // Validate the submitted form data
        $request->validate([
            'grade_id' => 'required',
            'class_id' => 'required',
            'semester' => 'required',
            'student_id' => 'required',
            'marks' => 'required|array', // Validate marks as an array
            'marks.*' => 'required|integer|min:0|max:100', // Validate individual marks
        ]);

        // Retrieve the student and other required information
        $gradeId = $request->input('grade_id');
        $classId = $request->input('class_id');
        $semester = $request->input('semester');
        $studentId = $request->input('student_id');
        $marks = $request->input('marks'); // Marks is an array

        // Retrieve the list of all subjects
        $subjects = Subject::all();

        // Ensure the number of marks matches the number of subjects
        if (count($marks) !== count($subjects)) {
            return redirect()->back()->with('error', 'Number of marks does not match the number of subjects.');
        }

        // Loop through subjects and marks, and store them
        foreach ($subjects as $key => $subject) {
            $mark = new Mark();
            $mark->grade_id = $gradeId;
            $mark->class_id = $classId;
            $mark->semester = $semester;
            $mark->student_id = $studentId;
            $mark->subject_id = $subject->id; // Correct subject association
            $mark->marks = (int)$marks[$key]; // Convert to integer
            $mark->save();
        }

        // Redirect back to the form with a success message
        return redirect()->route('marks.create')->with('success', 'Marks submitted successfully.');
    }


    // Display student marks
    public function view()
    {
        // Retrieve the currently authenticated student's marks
        $semesters=Mark::all();
        $student = Auth::user()->student;
        $marks = Mark::where('student_id', $student->id)->get();

        return view('marks.view', compact('marks','semesters'));
    }
    public function tea_view()
    {
        // Retrieve the currently authenticated teacher's information
        $teacher = Auth::user()->teacher;

        // Retrieve the marks associated with the teacher's grade and class
        $marks = Mark::where('grade_id', $teacher->grade_id)
            ->where('class_id', $teacher->class_id)
            ->get();

        // You can still retrieve all available semesters here if needed
        $semesters = Mark::all();

        return view('marks.tea_view', compact('marks', 'semesters'));
    }


    public function index()
    {

        return view('marks.index');
    }


public function getStudents(Request $request)
{
    $gradeId = $request->input('grade_id');
    $classId = $request->input('class_id');

    // Query the students based on the selected grade and class
    $students = Students::where('grade_id', $gradeId)
        ->where('class_id', $classId)
        ->get();

    return response()->json($students);
}

    public function edit($id)
    {
        // Retrieve the mark by its ID from the database
        $mark = Mark::findOrFail($id);

        // Pass the mark to the view
        return view('marks.edit', compact('mark'));
    }


    public function update(Request $request, Mark $mark)
    {
        // Validate and update the marks data
        $request->validate([
            'marks' => 'required|array',
            'marks.*' => 'required|integer|min:0|max:100',
        ]);

        $mark->update([
            'marks' => $request->input('marks'),
        ]);

        return redirect()->route('marks.index')->with('success', 'Marks updated successfully.');
    }

    public function confirmDelete(Mark $mark)
    {
        // Show the confirmation view
        return view('marks.confirmDelete', compact('mark'));
    }

    public function destroy(Mark $mark)
    {
        // Delete the mark
        $mark->delete();

        return redirect()->route('marks.index')->with('success', 'Mark deleted successfully.');
    }


    public function editSheet()
    {
        // Retrieve the marks you want to edit (e.g., all marks associated with the teacher)
        $teacher = Auth::user()->teacher;
        $marks = Mark::where('grade_id', $teacher->grade_id)
            ->where('class_id', $teacher->class_id)
            ->get();

        // You can also retrieve all available semesters here if needed
        $semesters = Mark::all();

        return view('marks.editSheet', compact('marks', 'semesters'));
    }
    public function updateSheet(Request $request)
    {
        // Validate and update the entire mark sheet
        $request->validate([
            'marks' => 'required|array',
            'marks.*' => 'required|integer|min:0|max:100',
        ]);

        foreach ($request->input('marks') as $markId => $newMark) {
            $mark = Mark::findOrFail($markId);
            $mark->marks = $newMark;
            $mark->save();
        }

        return redirect()->route('tea-marks-view')->with('success', 'Mark sheet updated successfully.');
    }


}
