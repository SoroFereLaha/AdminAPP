<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateMatièresRequest;
use App\Http\Requests\EditMatièresRequest;
use App\Models\matieres;
use App\Models\Prof;
use Exception;
use Illuminate\Http\Request;

class MatieresController extends Controller
{

    public function getGroupesByMatiere($id)
    {
        try {
            $matiere = Matieres::with('groupes')->find($id);

            if (!$matiere) {
                return response()->json([
                    'status_code' => 404,
                    'status_message' => 'La matière spécifiée n\'existe pas.',
                    'data' => null
                ], 404);
            }

            return response()->json([
                'status_code' => 200,
                'status_message' => 'Groupes associés à la matière récupérés avec succès',
                'data' => $matiere->groupes
            ]);
        } catch (Exception $e) {
            return response()->json($e);
        }
    }


    public function index()
    {
        try {
            $matieres = Matieres::with(['prof', 'groupes'])->get();

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
            
            $prof = Prof::find($request->prof_id);

            if (!$prof) {
                return response()->json([
                    'status_code' => 404,
                    'status_message' => 'Le professeur spécifié n\'existe pas.',
                    'data' => null
                ], 404);
            }


            $post = new matieres();
            $post->nom = $request->nom;
            $post->prof_id = $request->prof_id;
            $post->description = $request->description;
            $post->prix = $request->prix;

            if ($post->save()) {
                if ($request->has('groupes')) {
                    $post->groupes()->sync($request->groupes);
                }
            }

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
            $post->prix = $request->prix;

            if ($request->has('groupes')) {
                $post->groupes()->sync($request->groupes);
            }

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
