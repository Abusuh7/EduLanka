<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $role = Auth::user()->role;

        if($role == 'admin'){
            return view('admin.dashboard');
        }
        elseif($role == 'teacher')
        {
            return view('teacher.dashboard');
        }
        elseif($role == 'primary')
        {
            return view('primaryStudent.dashboard');
        }
        else
        {
            return view('secondaryStudent.dashboard');
        }
    }
}
