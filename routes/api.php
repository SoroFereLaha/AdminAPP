<?php

use App\Http\Controllers\Api\EtudiantController;
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

route::get('etudiant', [EtudiantController::class, 'index']);
Route::post('etudiant/create', [EtudiantController::class, 'store']);
Route::put('etudiant/edite/{id}', [EtudiantController::class, 'update']);
Route::delete('etudiant/{post}', [EtudiantController::class, 'delete']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
