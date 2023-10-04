<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateExamensRequest;
use App\Models\Examens;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ExamensController extends Controller
{
    public function index()
    {
        try {
            $examens = Examens::join('matieres', 'examens.matiere_id', '=', 'matieres.id')
            ->select('examens.*', 'matieres.nom as nom_matiere')
            ->orderBy('date', 'asc') // Tri par date croissante
            ->get();

            return response()->json([
                'status_code' => 200,
                'status_message' => 'les examens ont été récupérés',
                'data' => $examens
            ]);
        } catch (Exception $e) {
            return response()->json($e);
        }
    }



    public function store(CreateExamensRequest $request)
    {
        try {
            // Vérifiez s'il existe déjà un examen avec les mêmes critères (date, heure, salle)
            $existingExam = Examens::where('date', $request->date)
                ->where('heure_debut', $request->heure_debut)
                ->where('heure_fin', $request->heure_fin)
                ->where('Salle', $request->Salle)
                ->first();

            if ($existingExam) {
                return response()->json([
                    'status_code' => 422,
                    'status_message' => 'Un examen avec les mêmes (salles ou groupes) existe déjà',
                    'data' => $existingExam
                ], 422);
            }

            // Vérifiez s'il existe déjà un examen avec les mêmes critères (date, heure) dans la même salle
            $existingExamInSameRoom = Examens::where('date', $request->date)
            ->where(function ($query) use ($request) {
                $query->where(function ($query) use ($request) {
                    $query->where('heure_debut', '<', $request->heure_debut)
                    ->where('heure_fin', '>', $request->heure_debut);
                })
                    ->orWhere(function ($query) use ($request) {
                        $query->where('heure_debut', '<', $request->heure_fin)
                        ->where('heure_fin', '>', $request->heure_fin);
                    });
            })
                ->where('Salle', '=', $request->Salle) // Salle identique seulement
                ->first();

            if ($existingExamInSameRoom) {
                return response()->json([
                    'status_code' => 422,
                    'status_message' => 'Un examen existe déjà à la même date et heure dans la même salle.',
                    'data' => $existingExamInSameRoom
                ], 422);
            }


            // Vérifiez s'il existe déjà un examen avec les mêmes critères (date, heure, groupe, matière)
            $existingExamWithSameDetails = Examens::where('date', $request->date)
            ->where('heure_debut', $request->heure_debut)
            ->where('heure_fin', $request->heure_fin)
            ->where('groupe', $request->groupe)
                ->where('matiere_id', $request->matiere_id)
                ->first();

            if ($existingExamWithSameDetails) {
                return response()->json([
                    'status_code' => 422,
                    'status_message' => 'Un examen pour la même matière et le même groupe existe déjà à cette heure.',
                    'data' => $existingExamWithSameDetails
                ], 422);
            }
            
            // Si aucun examen similaire n'existe, créez un nouvel examen
            $post = new Examens();
            $post->date = $request->date;
            $post->heure_debut = $request->heure_debut;
            $post->heure_fin = $request->heure_fin;
            $post->Salle = $request->Salle;
            $post->info = $request->info;
            $post->groupe = $request->groupe;
            $post->matiere_id = $request->matiere_id;
            $post->save();

            return response()->json([
                'status_code' => 201,
                'status_message' => 'Examen ajouté avec succès',
                'data' => $post
            ], 201);
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->errors()], 422);
        } catch (Exception $e) {
            return response()->json(['error' => 'Erreur interne du serveur'], 500);
        }
    }


    public function delete(Examens $post)
    {
        try {

            $post->delete();

            return response()->json([
                'status_code' => 200,
                'status_message' => 'examen supprimer avec succes',
                'data' => $post

            ]);
        } catch (Exception $e) {

            return response()->json($e);
        }
    }
}
