<?php


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

Route::get('redirects', 'App\Http\Controllers\HomeController@index');

//View when admin users is clicked
Route::get('/admin/users', function () {
    return view('admin.users');
})->name('adminUsers');


//admin views
Route::get('/admin/users', [StudentsController::class, 'index'])->name('displayStudents');

// Route::get('/admin/create', [StudentsController::class, 'create'])->name('create');

Route::post('/admin/studentCreate', [StudentsController::class, 'store'])->name('studentCreate');

// Route::get('/admin/{id}', [StudentsController::class, 'show'])->name('show');

// Route::get('/admin/{id}/edit', [StudentsController::class, 'edit'])->name('edit');

// Route::put('/admin/{id}', [StudentsController::class, 'update'])->name('update');

// Route::delete('/admin/{id}', [PrimaryStudentsController::class, 'destroy'])->name('destroy');



//For Teacher Registration
Route::post('/admin/teacherCreate', [TeachersController::class, 'store'])->name('teacherCreate');
