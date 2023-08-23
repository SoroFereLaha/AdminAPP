<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateGroupesRequest;
use App\Http\Requests\EditGroupsRequest;
use Illuminate\Http\Request;
use App\Models\Groupes;
use Exception;

class GroupesControlle extends Controller
{
    public function index()
    {
        try {

            return response()->json([
                'status_code' => 200,
                'status_message' => 'les groupes on été récupérés',
                'data' => Groupes::all()

            ]);
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    public function store(CreateGroupesRequest $request)
    {



        try {
            $post = new Groupes();
            $post->nom_group = $request->nom_group;
            $post->save();

            return response()->json([
                'status_code' => 200,
                'status_message' => 'le groups a été ajouté',
                'data' => $post

            ]);
        } catch (Exception $e) {

            return response()->json($e);
        }
    }


    public function update(EditGroupsRequest $request, $id)
    {

        try {

            $post = Groupes::find($request->id);
            $post->nom_group = $request->nom_group;
            $post->save();

            return response()->json([
                'status_code' => 200,
                'status_message' => 'le group a été mis à jour',
                'data' => $post

            ]);
        } catch (Exception $e) {

            return response()->json($e);
        }
    }

    public function delete(Groupes $post)
    {
        try {

            $post->delete();

            return response()->json([
                'status_code' => 200,
                'status_message' => 'le group a été supprimer avec succes',
                'data' => $post

            ]);
        } catch (Exception $e) {

            return response()->json($e);
        }
    }
}
