<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePayementRequest;
use App\Http\Requests\EditPayementRequest;
use Illuminate\Http\Request;
use Exception;
use App\Models\Payement;
use App\Models\Etudiant;

class PayementController extends Controller
{
    public function listByStudent($etudiantId)
    {
        try {
            $payement = Payement::where('etudiant_id', $etudiantId)
                ->get();

            return response()->json([
                'status_code' => 200,
                'status_message' => 'Les payements de l\'étudiant ont été récupérées',
                'data' => $payement
            ]);
        } catch (Exception $e) {
            return response()->json($e);
        }
    }



    public function index()
    {
        try {

            $payement = Payement::with('etudiant')->get();

            return response()->json([
                'status_code' => 200,
                'status_message' => 'les payements on été récupérés',
                'data' => $payement

            ]);
        } catch (Exception $e) {
            return response()->json($e);
        }
    }


    public function store(CreatePayementRequest $request)
    {

        try {
            $post = new Payement();
            $post->date_payement = $request->date_payement;
            $post->somme_payer = $request->somme_payer;
            $post->reste = $request->reste;
            $post->etudiant_id = $request->etudiant_id;
            $post->save();

            return response()->json([
                'status_code' => 200,
                'status_message' => 'le payement a été ajouté',
                'data' => $post

            ]);
        } catch (Exception $e) {

            return response()->json($e);
        }
    }


    public function update(EditPayementRequest $request, $id)
    {
        try {
            $post = Payement::find($id);

            if (!$post) {
                return response()->json([
                    'status_code' => 404,
                    'status_message' => 'Le paiement n\'a pas été trouvé',
                ], 404);
            }

            $post->somme_payer = $request->somme_payer;
            $post->reste = $request->reste;
            $post->save();

            return response()->json([
                'status_code' => 200,
                'status_message' => 'Le paiement a été mis à jour',
                'data' => $post
            ]);
        } catch (Exception $e) {
            return response()->json($e);
        }
    }



}
