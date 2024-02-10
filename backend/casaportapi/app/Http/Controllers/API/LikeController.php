<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Like;
use App\Http\Resources\LikeResource;
class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $likes = Like::all();
        return LikeResource::collection($likes);
    }

    public function show(Like $like)
    {
        return new LikeResource($like);
    }

    public function store(Request $request)
    {
        $like = Like::create($request->all());
        return new LikeResource($like);
    }

    public function update(Request $request, Like $like)
    {
        $like->update($request->all());
        return new LikeResource($like);
    }

    public function destroy(Like $like)
    {
        $like->delete();
        return response()->json(null, 204);
    }
}
