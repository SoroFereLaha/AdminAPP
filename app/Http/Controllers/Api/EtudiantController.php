<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateEtudiantRequest;
use App\Http\Requests\EditEtudiantRequest;
use App\Models\Etudiant;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    public function index()
    {
        try {

            return response()->json([
                'status_code' => 200,
                'status_message' => 'les etudiant on été récupérés',
                'data' => Etudiant::all()

            ]);
        } catch (Exception $e) {
            return response()->json($e);
        }
    }


    public function store(CreateEtudiantRequest $request)
    {



        try {
            $post = new Etudiant();
            $post->nom = $request->nom;
            $post->prenom = $request->prenom;
            $post->age = $request->age;
            $post->genre = $request->genre;
            $post->save();

            return response()->json([
                'status_code' => 200,
                'status_message' => 'ajoue avec secces',
                'data' => $post

            ]);
        } catch (Exception $e) {

            return response()->json($e);
        }
    }

    public function update(EditEtudiantRequest $request, $id)
    {

        try {

            $post = Etudiant::find($request->id);
            $post->nom = $request->nom;
            $post->prenom = $request->prenom;
            $post->age = $request->age;
            $post->save();

            return response()->json([
                'status_code' => 200,
                'status_message' => 'le post a été mis à jour',
                'data' => $post

            ]);
        } catch (Exception $e) {

            return response()->json($e);
        }
    }


    public function delete(Etudiant $post)
    {
        try {

            $post->delete();

            return response()->json([
                'status_code' => 200,
                'status_message' => 'le post a été supprimer avec succes',
                'data' => $post

            ]);
        } catch (Exception $e) {

            return response()->json($e);
        }
    }

}
