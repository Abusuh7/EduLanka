<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class showCategoryController extends Controller
{
    public function teacher()
    {

        //display only teacher role
        $teachers = User::where('role', 'teacher')->get();
        return view('admin.teachers-list', compact('teachers'));
    }

    public function primary()
    {
        //display only primary role
        $primaryStudents = User::where('role', 'primary')->get();
        return view('admin.primary-stu-list', compact('primaryStudents'));
    }

    public function secondary()
    {
        //display only secondary role
        $secondaryStudents = User::where('role', 'secondary')->get();
        return view('admin.secondary-stu-list', compact('secondaryStudents'));
    }
}
