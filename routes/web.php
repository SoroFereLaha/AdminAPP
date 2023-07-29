<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentTimetableController;
use App\Http\Controllers\TeacherTimetableController;

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
    return view('welcome');
});

Route::group(['middleware'=> 'web'], function () {
    Route::get('/studentTimetable/list', [StudentTimetableController::class, 'list'])->name('studentTimetable');
    Route::get('/studentTimetable/show', [StudentTimetableController::class, 'show'])->name('studentTimetable');  
    Route::post('/studentTimetable/traitement', [StudentTimetableController::class, 'add_timetable'])->name('view_timetable');

});
Route::group(['middleware'=> 'web'], function () {
    Route::get('/teacherTimetable/list', [TeacherTimetableController::class, 'list'])->name('teacherTimetable');
    Route::get('/teacherTimetable/show', [TeacherTimetableController::class, 'show'])->name('teacherTimetable');  
    Route::post('/teacherTimetable/traitement', [TeacherTimetableController::class, 'add_timetable'])->name('voir_timetable');

});

Route::get('/dashboard', [TeacherTimetableController::class, 'showDashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin/UsersController ne fonctionnait pas, <<class does not exist>> alors que la class existe. Alors jai du mettre le chemin complet
//Route::resource('/admin/users', 'App\Http\Controllers\Admin\UsersController');

Route::namespace('App\Http\Controllers\Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function(){
    Route::resource('users', 'UsersController');
});


require __DIR__.'/auth.php';
