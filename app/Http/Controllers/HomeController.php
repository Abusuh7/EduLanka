<?php

namespace App\Http\Controllers;

use App\Models\Banners;
use App\Models\Classes;
use App\Models\Grades;
use App\Models\subject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $role = Auth::user()->role;
        $status = Auth::user()->status;

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

            $grades = Grades::all();
            $classes = Classes::all();
            $subjects = Subject::all();



            return view('admin.dashboard', compact('primaryStudentCount', 'secondaryStudentCount', 'teacherCount', 'totalStudents','grades', 'classes','subjects'));
            // return view('admin.dashboard');

        } elseif ($role == 'teacher' && $status == 'activated') {

            // Get all the banners whicxh are active and has a visibity of secondarystu or bothstu or all and compact them
        $banners = Banners::where('status', 'active')->where('visibility', 'teacher')->orWhere('visibility', 'all')->get();
        //  $banners = Banners::where('status', 'active')->get();

         // Get all the banners
         $all = Banners::all();
            $grades = Grades::all();
            $classes = Classes::all();

         return view('teacher.dashboard', compact('banners', 'all','grades', 'classes'));

        } elseif ($role == 'primary' && $status == 'activated') {

            // Get all the banners whicxh are active and has a visibity of secondarystu and compact them
            $banners = Banners::where('status', 'active')->where('visibility', 'primarystu')->orWhere('visibility', 'bothstu')->orWhere('visibility', 'all')->get();
            //  $banners = Banners::where('status', 'active')->get();

            // Get all the banners
            $all = Banners::all();
            $grades = Grades::all();
            $classes = Classes::all();
            return view('primaryStudent.dashboard', compact('banners', 'all','grades', 'classes'));

        } elseif ($role == 'secondary' && $status == 'activated') {

            // Get all the banners which are active and has a visibity of secondarystu and compact them
            $banners = Banners::where('status', 'active')->where('visibility', 'secondarystu')->orWhere('visibility', 'bothstu')->orWhere('visibility', 'all')->get();
            //  $banners = Banners::where('status', 'active')->get();

            // Get all the banners
            $all = Banners::all();
            $grades = Grades::all();
            $classes = Classes::all();

            return view('secondaryStudent.dashboard', compact('banners', 'all','grades', 'classes'));

        } elseif ($role == 'teacher' && $status == 'deactivated' || $role == 'primary' && $status == 'deactivated' || $role == 'secondary' && $status == 'deactivated') {
            //return a error message to the user that the account has been deactivated
            return view('deactivated-view');
        } else {
            return view('terminated-view');
        }
    }
}
