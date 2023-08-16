<?php

namespace App\Http\Controllers\Api;

use App\Models\pos;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\EditPostRequest;
use Exception;
use PhpParser\Node\Stmt\TryCatch;

class PostController extends Controller
{

    public function index()
    {
        try {

            return response()->json([
                'status_code' => 200,
                'status_message' => 'les post on été récupérés',
                'data' => Pos::all()

            ]);
        } catch (Exception $e) {
            return response()->json($e);
        }
    }



    public function store(CreatePostRequest $request)
    {



        try {
            $post = new pos();
            $post->titre = $request->titre;
            $post->description = $request->description;
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


    public function update(EditPostRequest $request, $id)
    {

        try {

            $post = pos::find($request->id);
            $post->titre = $request->titre;
            $post->description = $request->description;

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


    public function delete(Pos $post)
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
