<?php

use App\Http\Controllers\Api\AbsencesControlle;
use App\Http\Controllers\Api\EtudiantController;
use App\Http\Controllers\Api\ExamensController;
use App\Http\Controllers\Api\GroupesControlle;
use App\Http\Controllers\Api\MatieresController;
use App\Http\Controllers\Api\PayementController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\ProfController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Expr\PostDec;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Recuperer la liste des posts

Route::get('posts', [PostController::class, 'index']);

//Ajouter un poste /Post / Put /Path

Route::post('posts/create', [PostController::class, 'store']);
Route::put('posts/edit/{id}', [PostController::class, 'update']);
Route::delete('posts/{post}', [PostController::class, 'delete']);

//les route pour la table profs

route::get('prof', [ProfController::class, 'index']);
Route::post('prof/create', [ProfController::class, 'store']);
Route::put('prof/edit/{id}', [ProfController::class, 'update']);
Route::delete('prof/{post}', [ProfController::class, 'delete']);

//les route poure la table etudiant 
Route::get('matiere/{matiereId}/etudiants', [EtudiantController::class, 'getEtudiantsByMatiere']);
route::get('etudiant', [EtudiantController::class, 'index']);
Route::post('etudiant/create', [EtudiantController::class, 'store']);
Route::put('etudiant/edit/{id}', [EtudiantController::class, 'update']);
Route::delete('etudiant/{post}', [EtudiantController::class, 'delete']);

//les route poure la table Matière 

route::get('matiere', [MatieresController::class, 'index']);
route::get('matiere/{id}/groupes', [MatieresController::class, 'getGroupesByMatiere']);
Route::post('matiere/create', [MatieresController::class, 'store']);
Route::put('matiere/edit/{id}', [MatieresController::class, 'update']);
Route::delete('matiere/{post}', [MatieresController::class, 'delete']);

//les groupe

Route::get('groups', [GroupesControlle::class, 'index']);
Route::post('groups/create', [GroupesControlle::class, 'store']);
Route::put('groups/edit/{id}', [GroupesControlle::class, 'update']);
Route::delete('groups/{post}', [GroupesControlle::class, 'delete']);


//les Absences
Route::get('absence', [AbsencesControlle::class, 'index']);
Route::get('/absence/{etudiantId}', [AbsencesControlle::class, 'listByStudent']);
Route::post('absence/create', [AbsencesControlle::class, 'store']);
Route::delete('absence/{post}', [AbsencesControlle::class, 'delete']);


//les payement
Route::get('payement', [PayementController::class, 'index']);
Route::get('/payement/{etudiantId}', [PayementController::class, 'listByStudent']);
Route::post('payement/create', [PayementController::class, 'store']);
Route::put('payement/edit/{id}', [PayementController::class, 'update']);

//les examens
Route::get('examens', [ExamensController::class, 'index']);
Route::post('examens/create', [ExamensController::class, 'store']);
Route::delete('examens/{post}', [ExamensController::class, 'delete']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
