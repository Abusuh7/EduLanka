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
       ddd( $content->save());

        // Redirect back to the form with a success message or to another page
        return redirect()->route('content.create')->with('success', 'Content submitted successfully.');
    }


// app/Http/Controllers/StudentContentController.php
    public function Stu_index(Request $request)
    {
        // Retrieve grades and classes from your database
        $grades = Grades::all();
        $classes = Classes::all();

        // Default values for filtering
        $selectedGrade = $request->input('grade_id');
        $selectedClass = $request->input('class_id');

        // Query the contents based on filtering options
        $contents = Content::when($selectedGrade, function ($query, $selectedGrade) {
            return $query->where('grade_id', $selectedGrade);
        })
            ->when($selectedClass, function ($query, $selectedClass) {
                return $query->where('class_id', $selectedClass);
            })
            ->get();

        return view('content.student_view', compact('grades', 'classes', 'contents'));
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
