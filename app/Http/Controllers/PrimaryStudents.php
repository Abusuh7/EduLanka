<?php

namespace App\Http\Controllers;

use App\Models\Parents_Details;
use App\Models\Primary_Students;
use App\Models\Student_Enrollment;
use Illuminate\Http\Request;


class PrimaryStudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $primaryStudents = Primary_Students::all();
        return view('primary_students.index', compact('primaryStudents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('primary_students.create');
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
            'email' => 'required|email',
            'gender' => 'required|string',
            'parent_fname' => 'required|string',
            'parent_lname' => 'required|string',
            'parent_email' => 'required|email',
            'enroll_date' => 'required|date', // Assuming you have a field for enrollment date
        ]);

        // Create the parent details record
        $parentDetails = Parents_Details::create([
            'fname' => $validatedData['parent_fname'],
            'lname' => $validatedData['parent_lname'],
            'email' => $validatedData['parent_email'],
            // Add other parent details as needed
        ]);

        // Add the parent_id to the validated data before creating the primary student record
        $validatedData['parent_id'] = $parentDetails->id;

        // Create the enrollment record
        $enrollment = Student_Enrollment::create([
            'enroll_date' => $validatedData['enroll_date'],
            // Add other enrollment details as needed
        ]);

        // Add the enroll_id to the validated data before creating the primary student record
        $validatedData['enroll_id'] = $enrollment->id;

        // Create a new primary student record with the validated data
        Primary_Students::create($validatedData);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $primaryStudent = Primary_Students::findOrFail($id);
        return view('primary_students.show', compact('primaryStudent'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $primaryStudent = Primary_Students::findOrFail($id);
        return view('primary_students.edit', compact('primaryStudent'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'fname' => 'required|string',
            'lname' => 'required|string',
            'dob' => 'required|date',
            'email' => 'required|email',
            'gender' => 'required|string',
            'parent_id' => 'required|exists:parents_details,id',
            'enroll_id' => 'required|exists:student_enrollment,id',
        ]);

        $primaryStudent = Primary_Students::findOrFail($id);
        $primaryStudent->update($validatedData);

        return redirect()->route('primary_students.index')->with('success', 'Primary student updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $primaryStudent = Primary_Students::findOrFail($id);
        $primaryStudent->delete();

        return redirect()->route('primary_students.index')->with('success', 'Primary student deleted successfully.');
    }
}
