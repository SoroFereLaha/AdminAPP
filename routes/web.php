<?php

use App\Http\Controllers\SecretariatController;
use App\Http\Controllers\ProfileController;
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

Route::get('/admin/users/secretariats/secretariat',[SecretariatController::class, 'index'] )->name('admin.users.secretariats.secretariat');
Route::get('/admin/users/secretariats/inscriptions', [SecretariatController::class, 'inscrit'])->name('admin.users.secretariats.inscriptions');
Route::get('/admin/users/secretariats/formEtudiant', [SecretariatController::class, 'ajoutEt'])->name('admin.users.secretariats.formEtudiant');
Route::get('/admin/users/secretariats/formProf', [SecretariatController::class, 'ajoutProf'])->name('admin.users.secretariats.formProf');
Route::get('/admin/users/secretariats/formMatière', [SecretariatController::class, 'ajoutMatière'])->name('admin.users.secretariats.formMatière');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

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
