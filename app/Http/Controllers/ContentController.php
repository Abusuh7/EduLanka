<?php

namespace App\Http\Controllers;
use App\Models\Content;
use Illuminate\Http\Request;
use App\Models\Classes;
use App\Models\Grades;
use App\Models\Subject;

use App\Http\Controllers\Controller;

class ContentController extends Controller
{
    public function create()
    {
        // Fetch subjects, classes, and grades from your database

        $subjects = Subject::all();
        $classes = Classes::all();
        $grades = Grades::all();

        return view('content.create', compact('subjects', 'classes', 'grades'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'subject_id' => 'required',
            'class_id' => 'required',
            'grade_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'file_path' => 'required|file|mimes:pdf,docx,xls,xlsx,ppt,pptx|max:2048,nullable',
        ]);

        // Get the ID of the currently authenticated teacher
        $teacherId = auth()->user()->teacher_id;

        // Store content in your database, including the uploaded file
        $content = new Content();
        $content->subject_id = $request->input('subject_id');
        $content->class_id = $request->input('class_id');
        $content->grade_id = $request->input('grade_id');

        // Assign the teacher's ID
        $content->teacher_id = $teacherId;

        $content->title = $request->input('title');
        $content->description = $request->input('description');

        // Handle file upload
        if ($request->hasFile('file_path')) {
            $file = $request->file('file_path');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('content', $fileName); // Store uploaded file in 'storage/app/content' directory
            $content->file_path = $fileName;
        }

        // Save content to the database
        $content->save();

        // Redirect back to the form with a success message or to another page
        return redirect()->route('content.create')->with('success', 'Content submitted successfully.');
    }


// app/Http/Controllers/StudentContentController.php
    public function Stu_index(Request $request)
    {
        // Retrieve the currently authenticated user
        $user = auth()->user();

        // Check if the user is a student
        if ($user->role === 'secondary' || $user->role === 'primary') {
            // Retrieve the student's information
            $student = $user->student;

            // Check if the student information is available
            if ($student) {
                // Get the grade_id and class_id
                $gradeId = $student->grade_id;
                $classId = $student->class_id;
                $subjectId = $request->input('subject_id'); // Get the selected subject

                // Query the contents based on the student's grade_id, class_id, and subject_id
                $contents = Content::where('grade_id', $gradeId)
                    ->where('class_id', $classId)
                    ->when($subjectId, function ($query) use ($subjectId) {
                        return $query->where('subject_id', $subjectId);
                    })
                    ->get();
            } else {
                return redirect()->route('studentDashboard')->with('error', 'Student information not found.');
            }
        } elseif ($user->role === 'teacher') {
            // If the user is a teacher, implement teacher-specific logic here
            // For example, retrieve the contents that the teacher has created
            $teacherId = $user->teacher_id;

            $contents = Content::where('teacher_id', $teacherId)->get();
        } else {
            // Handle other roles (if any) here
            $contents = Content::all();
        }

        // Retrieve grades and classes from your database (optional)
        $grades = Grades::all();
        $classes = Classes::all();
        $subjects = Subject::all();

        return view('content.student_view', compact('grades', 'classes', 'contents', 'subjects'));
    }





    public function download($id)
    {
        // Find the content by ID
        $content = Content::find($id);

        if (!$content) {
            return back()->with('error', 'Content not found.');
        }

        // Implement the logic to download the file (e.g., using Laravel's response)
        return response()->download(storage_path('app/content/' . $content->file_path));
    }


}
