<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProfRequest;
use App\Http\Requests\EditProfRequest;
use App\Models\Prof;
use Illuminate\Http\Request;
use Exception;

class ProfController extends Controller
{
    public function index()
    {
        try {

            $profs = Prof::with('students')->get();

            return response()->json([
                'status_code' => 200,
                'status_message' => 'les profs on été récupérés',
                'data' => $profs

            ]);
        } catch (Exception $e) {
            return response()->json($e);
        }


        
    }


    public function store(CreateProfRequest $request)
    {



        try {
            $post = new Prof();
            $post->nom = $request->nom;
            $post->prenom = $request->prenom;
            $post->age = $request->age;
            $post->email = $request->email;
            $post->class = $request->class;
            $post->save();

            return response()->json([
                'status_code' => 200,
                'status_message' => 'le post a été ajouté',
                'data' => $post

            ]);
        } catch (Exception $e) {

            return response()->json($e);
        }
    }



    public function update(EditProfRequest $request, $id)
    {

        try {

            $post = Prof::find($request->id);
            $post->nom = $request->nom;
            $post->prenom = $request->prenom;
            $post->age = $request->age;
            $post->email = $request->email;
            $post->class = $request->class;
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


    public function delete(Prof $post)
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
