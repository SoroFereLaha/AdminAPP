<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateAbsenceRequest;
use Exception;
use App\Models\Absence;
use Illuminate\Http\Request;

class AbsencesControlle extends Controller
{

    public function listByStudent($etudiantId)
    {
        try {
            $absences = Absence::where('etudiant_id', $etudiantId)
                ->get();

            return response()->json([
                'status_code' => 200,
                'status_message' => 'Les absences de l\'étudiant ont été récupérées',
                'data' => $absences
            ]);
        } catch (Exception $e) {
            return response()->json($e);
        }
    }



    public function index()
    {
        try {

            $absences = Absence::with('etudiant')->get();

            return response()->json([
                'status_code' => 200,
                'status_message' => 'les Absence on été récupérés',
                'data' => $absences

            ]);
        } catch (Exception $e) {
            return response()->json($e);
        }
    }


    public function store(CreateAbsenceRequest $request)
    {

        try {
            $post = new Absence();
            $post->date = $request->date;
            $post->description = $request->description;
            $post->etudiant_id = $request->etudiant_id;
            $post->save();

            return response()->json([
                'status_code' => 200,
                'status_message' => 'absence a été ajouté',
                'data' => $post

            ]);
        } catch (Exception $e) {

            return response()->json($e);
        }
    }


    public function delete(Absence $post)
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
