<?php

use App\Http\Controllers\PrimaryStudents1;
use App\Http\Controllers\PrimaryStudentsController;
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


//admin views
// Route::get('/admin', [PrimaryStudentsController::class, 'index'])->name('index');

// Route::get('/admin/create', [PrimaryStudentsController::class, 'create'])->name('create');

Route::post('/admin/store', [PrimaryStudents1::class, 'store'])->name('store');

// Route::get('/admin/{id}', [PrimaryStudentsController::class, 'show'])->name('show');

// Route::get('/admin/{id}/edit', [PrimaryStudentsController::class, 'edit'])->name('edit');

// Route::put('/admin/{id}', [PrimaryStudentsController::class, 'update'])->name('update');

// Route::delete('/admin/{id}', [PrimaryStudentsController::class, 'destroy'])->name('destroy');
