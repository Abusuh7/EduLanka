<?php

use App\Http\Controllers\showCategoryController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\TeachersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    //redirect to login page
    // return redirect('/login');

    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


//Main Redirects
Route::get('redirects', 'App\Http\Controllers\HomeController@index');


//------------ADMIN ROUTES----------------

//View when adimn dashboard is clicked
Route::get('/admin', function () {
    return view('admin.dashboard');
})->name('adminDashboard');

//View when admin users is clicked
Route::get('/admin/users', function () {
    return view('admin.user-dashboard');
})->name('adminUsers');


//Admin views Choose in user dashboard (Teachers, Primary, Secondary)
Route::get('/admin/users/teachers', [showCategoryController::class, 'teacher',])->name('displayTeacher');
Route::get('/admin/users/primary', [showCategoryController::class, 'primary'])->name('displayPrimary');
Route::get('/admin/users/secondary', [showCategoryController::class, 'secondary'])->name('displaySecondary');


//For Student Registration
Route::post('/admin/studentCreate', [StudentsController::class, 'store'])->name('studentCreate');

//For Teacher Registration
Route::post('/admin/teacherCreate', [TeachersController::class, 'store'])->name('teacherCreate');




//------------TEACHER ROUTES----------------


//-----------------STUDENT ROUTES----------------



//------------Commented Code----------------

// Route::get('/admin/create', [StudentsController::class, 'create'])->name('create');

// Route::get('/admin/{id}', [StudentsController::class, 'show'])->name('show');

// Route::get('/admin/{id}/edit', [StudentsController::class, 'edit'])->name('edit');

// Route::put('/admin/{id}', [StudentsController::class, 'update'])->name('update');

// Route::delete('/admin/{id}', [PrimaryStudentsController::class, 'destroy'])->name('destroy');


