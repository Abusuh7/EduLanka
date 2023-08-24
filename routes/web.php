<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\DiscussionRoomController;
use App\Http\Controllers\PrimaryStudentsController;
use App\Http\Controllers\SecondaryStudentsController;
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
// Route::get('/admin', function () {
//     return view('admin.dashboard');
// })->name('adminDashboard');
Route::get('/admin/dashboard', [StudentsController::class, 'index'])->name('adminDashboard');

//View when admin users is clicked
Route::get('/admin/users', function () {
    return view('admin.user-dashboard');
})->name('adminUsers');

//view when admin history is clicked
Route::get('/admin/history', function () {
    return view('admin.history.user-history');
})->name('adminHistory');

//view when admin banner is clicked
Route::get('/admin/banner', [BannerController::class, 'index'])->name('adminBanner');

//view when admin discussion room is clicked
Route::get('/admin/discussion-room', [DiscussionRoomController::class, 'adminView'])->name('adminDiscussionRoom');





//Admin views if user is clicked (Teachers, Primary, Secondary)
Route::get('/admin/users/teachers', [showCategoryController::class, 'teacher',])->name('displayTeacher');
Route::get('/admin/users/primary', [showCategoryController::class, 'primary'])->name('displayPrimary');
Route::get('/admin/users/secondary', [showCategoryController::class, 'secondary'])->name('displaySecondary');

//Admion view if history clicked (Teachers, Primary, Secondary)
Route::get('/admin/history/teachers', [showCategoryController::class, 'terminatedTeacher'])->name('displayTerminatedTeacher');
Route::get('/admin/history/primary', [showCategoryController::class, 'terminatedPrimary'])->name('displayTerminatedPrimary');
Route::get('/admin/history/secondary', [showCategoryController::class, 'terminatedSecondary'])->name('displayTerminatedSecondary');


//For Student Registration
Route::post('/admin/studentCreate', [StudentsController::class, 'store'])->name('studentCreate');

//For Teacher Registration
Route::post('/admin/teacherCreate', [TeachersController::class, 'store'])->name('teacherCreate');


//For Student/Teacher Profile View
Route::get('/admin/student/profile/{id}', [StudentsController::class, 'showStudentProfile'])->name('studentProfile');
Route::get('/admin/teacher/profile/{id}', [TeachersController::class, 'showTeacherDetails'])->name('teacherProfile');


//For Student/Teacher Profile Edit
Route::get('/admin/student/profile/{id}/edit', [StudentsController::class, 'editStudentProfile'])->name('editStudentProfile');
Route::get('/admin/teacher/profile/{id}/edit', [TeachersController::class, 'editTeacherProfile'])->name('editTeacherProfile');


//For Student/Teacher Profile Update
Route::put('/admin/student/profile/{id}/update', [StudentsController::class, 'updateStudentProfile'])->name('updateStudentProfile');
Route::put('/admin/teacher/profile/{id}/update', [TeachersController::class, 'updateTeacherProfile'])->name('updateTeacherProfile');


//Deactivate/Activate Student Users
Route::get('/admin/student/{id}/deactivate', [StudentsController::class, 'deactivate'])->name('deactivateStudent');
Route::get('/admin/student/{id}/activate', [StudentsController::class, 'activate'])->name('activateStudent');

//Terminate Student Users
Route::get('/admin/student/{id}/prompt', [StudentsController::class, 'terminatePrompt'])->name('terminateStudent');
Route::put('/admin/student/{id}/terminate', [StudentsController::class, 'terminate'])->name('terminateStudentConfirm');

//Terminate Teacher Users
Route::get('/admin/teacher/{id}/prompt', [TeachersController::class, 'terminatePrompt'])->name('terminateTeacher');
Route::put('/admin/teacher/{id}/terminate', [TeachersController::class, 'terminate'])->name('terminateTeacherConfirm');

//Rollback Student Users
Route::get('/admin/student/{id}/rollback', [StudentsController::class, 'rollback'])->name('rollbackStudent');

//Rollback Teacher Users
Route::get('/admin/teacher/{id}/rollback', [TeachersController::class, 'rollback'])->name('rollbackTeacher');


//Deactivate/Activate Teacher Users
Route::get('/admin/teacher/{id}/deactivate', [TeachersController::class, 'deactivate'])->name('deactivateTeacher');
Route::get('/admin/teacher/{id}/activate', [TeachersController::class, 'activate'])->name('activateTeacher');


//Admin banner routes
Route::post('/admin/bannerCreate', [BannerController::class, 'create'])->name('bannerCreate');
Route::get('/admin/banner/{id}/deactivate', [BannerController::class, 'deactivate'])->name('deactivateBanner');
Route::get('/admin/banner/{id}/activate', [BannerController::class, 'activate'])->name('activateBanner');
Route::get('/admin/banner/{id}/delete', [BannerController::class, 'delete'])->name('deleteBanner');
Route::get('/admin/banner/{id}/edit', [BannerController::class, 'edit'])->name('editBanner');
Route::put('/admin/banner/{id}/update', [BannerController::class, 'update'])->name('updateBanner');





//------------TEACHER ROUTES----------------

//When teacher dashboard is clicked
Route::get('/teacher/dashboard', [TeachersController::class, 'dashboard'])->name('teacherDashboard');

//When reservations is clicked
Route::get('/teacher/reservations', [TeachersController::class, 'teacherReservations'])->name('teacherReservations');

//Discussion Room Booking
Route::get('/teacher/discussion-room', [DiscussionRoomController::class, 'teacherView'])->name('teacherDiscussionRoom');
Route::post('/teacher/discussion-room', [DiscussionRoomController::class, 'teacherCreate'])->name('CreateRoomBookingTeacher');





//-----------------PPRIMARY STUDENT ROUTES----------------

//When student dashboard is clicked
Route::get('/primary/dashboard', [PrimaryStudentsController::class, 'dashboard'])->name('primaryStudentDashboard');

//When reservations is clicked
Route::get('/primary/reservations', [PrimaryStudentsController::class, 'primaryReservations'])->name('primaryStudentReservations');


//Discussion Room Booking
Route::get('/primary/discussion-room', [DiscussionRoomController::class, 'primaryStudentView'])->name('StudentDiscussionRoomPrimary');
Route::post('/primary/discussion-room', [DiscussionRoomController::class, 'primaryStudentCreate'])->name('CreateRoomBookingPrimary');




//------------SECONDARY STUDENT ROUTES----------------


//When student dashboard is clicked
Route::get('/secondary/dashboard', [SecondaryStudentsController::class, 'dashboard'])->name('studentDashboard');

//When reservations is clicked
Route::get('/student/reservations', [SecondaryStudentsController::class, 'secondaryReservations'])->name('studentReservations');



//Discussion Room Booking
Route::get('/student/discussion-room', [DiscussionRoomController::class, 'secondaryStudentView'])->name('studentDiscussionRoomSecondary');
Route::post('/student/discussion-room', [DiscussionRoomController::class, 'secondaryStudentCreate'])->name('CreateRoomBookingSecondary');






//------------Commented Code----------------

// Route::get('/admin/create', [StudentsController::class, 'create'])->name('create');

// Route::get('/admin/{id}', [StudentsController::class, 'show'])->name('show');

// Route::get('/admin/{id}/edit', [StudentsController::class, 'edit'])->name('edit');

// Route::put('/admin/{id}', [StudentsController::class, 'update'])->name('update');

// Route::delete('/admin/{id}', [PrimaryStudentsController::class, 'destroy'])->name('destroy');


