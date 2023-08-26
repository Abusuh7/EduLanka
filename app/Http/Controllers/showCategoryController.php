<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class showCategoryController extends Controller
{
    //Currenttly active users

    public function teacher()
    {

        //display only teacher role and status activated and deactivated only
        $teachers = User::where('role', 'teacher')->where('status', 'activated')->orWhere('status', 'deactivated')->get();
        return view('admin.teachers-list', compact('teachers'));
    }

    public function primary()
    {
        //display only primary role and status activated and deactivated only
        $primaryStudents = User::where('role', 'primary')->where('status', 'activated')->orWhere('status', 'deactivated')->get();
        return view('admin.primary-stu-list', compact('primaryStudents'));
    }

    public function secondary()
    {
        //display only secondary role and status activated and deactivated only
        $secondaryStudents = User::where('role', 'secondary')->where('status', 'activated')->orWhere('status', 'deactivated')->get();
        return view('admin.secondary-stu-list', compact('secondaryStudents'));
    }




    //Terminated users

    public function terminatedTeacher()
    {
        //display only terminated teacher
        $terminatedTeachers = User::where('role', 'teacher')->where('status', 'terminated')->get();
        return view('admin.history.teacher-history', compact('terminatedTeachers'));
    }

    public function terminatedPrimary()
    {
        //display only terminated primary
        $terminatedPrimary = User::where('role', 'primary')->where('status', 'terminated')->get();
        return view('admin.history.primary-history', compact('terminatedPrimary'));
    }

    public function terminatedSecondary()
    {
        //display only terminated secondary
        $terminatedSecondary = User::where('role', 'secondary')->where('status', 'terminated')->get();
        return view('admin.history.secondary-history', compact('terminatedSecondary'));
    }
}
