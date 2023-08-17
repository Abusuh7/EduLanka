<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $role = Auth::user()->role;

        if ($role == 'admin') {
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
            // return view('admin.dashboard');
        } elseif ($role == 'teacher') {
            return view('teacher.dashboard');
        } elseif ($role == 'primary') {
            return view('primaryStudent.dashboard');
        } else {
            return view('secondaryStudent.dashboard');
        }
    }
}
