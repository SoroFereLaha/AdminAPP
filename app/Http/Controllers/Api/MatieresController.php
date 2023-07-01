<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateMatièresRequest;
use App\Http\Requests\EditMatièresRequest;
use App\Models\matieres;
use Exception;
use Illuminate\Http\Request;

class MatieresController extends Controller
{

    public function index()
    {
        try {
            $matieres = Matieres::with('prof')->get();

            return response()->json([
                'status_code' => 200,
                'status_message' => 'les matières on été récupérés',
                'data' => $matieres

            ]);
        } catch (Exception $e) {
            return response()->json($e);
        }
    }


    public function store(CreateMatièresRequest $request)
    {



        try {
            $post = new matieres();
            $post->nom = $request->nom;
            $post->prof_id = $request->prof_id;
            $post->description = $request->description;
            $post->save();

            return response()->json([
                'status_code' => 200,
                'status_message' => 'la matières a été ajouté',
                'data' => $post

            ]);
        } catch (Exception $e) {

            return response()->json($e);
        }
    }

    public function update(EditMatièresRequest $request, $id)
    {

        try {

            $post = matieres::find($request->id);
            $post->nom = $request->nom;
            $post->prof_id = $request->prof_id;
            $post->description = $request->description;

            $post->save();

            return response()->json([
                'status_code' => 200,
                'status_message' => 'la matière a été mis à jour',
                'data' => $post

            ]);
        } catch (Exception $e) {

            return response()->json($e);
        }


        
    }

    public function delete(matieres $post)
    {
        try {

            $post->delete();

            return response()->json([
                'status_code' => 200,
                'status_message' => 'la matière à été supprimer avec succes',
                'data' => $post

            ]);
        } catch (Exception $e) {

            return response()->json($e);
        }
    }

}
