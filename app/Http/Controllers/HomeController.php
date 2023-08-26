<?php

namespace App\Http\Controllers;

use App\Models\Banners;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $role = Auth::user()->role;

        if ($role == 'admin') {
            //This as soon as the admin logs in, the dashboard will display the total number of students and teachers
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

            // Get all the banners whicxh are active and has a visibity of secondarystu or bothstu or all and compact them
        $banners = Banners::where('status', 'active')->where('visibility', 'teacher')->orWhere('visibility', 'all')->get();
        //  $banners = Banners::where('status', 'active')->get();

         // Get all the banners
         $all = Banners::all();

         return view('teacher.dashboard', compact('banners', 'all'));

        } elseif ($role == 'primary') {

            // Get all the banners whicxh are active and has a visibity of secondarystu and compact them
            $banners = Banners::where('status', 'active')->where('visibility', 'primarystu')->orWhere('visibility', 'bothstu')->orWhere('visibility', 'all')->get();
            //  $banners = Banners::where('status', 'active')->get();

            // Get all the banners
            $all = Banners::all();

            return view('primaryStudent.dashboard', compact('banners', 'all'));

        } else {

            // Get all the banners whicxh are active and has a visibity of secondarystu and compact them
            $banners = Banners::where('status', 'active')->where('visibility', 'secondarystu')->orWhere('visibility', 'bothstu')->orWhere('visibility', 'all')->get();
            //  $banners = Banners::where('status', 'active')->get();

            // Get all the banners
            $all = Banners::all();

            return view('secondaryStudent.dashboard', compact('banners', 'all'));
        }
    }
}
