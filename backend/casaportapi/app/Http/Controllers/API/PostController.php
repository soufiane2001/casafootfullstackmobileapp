<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Resources\PostResource;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('user', 'like.user', 'commente.user')->orderBy('created_at', 'desc')->paginate(4); // Eager load relationships
        return PostResource::collection($posts);
    }

    public function show(Post $post)
    {
        $post->load(['user', 'commente.user','like.user']); // Eager load comments and their associated users
        return new PostResource($post);
    }

    public function store(Request $request)
    {
        $post = Post::create($request->all());
        $post->load(['user', 'commente.user','like.user']); // Eager load comments and their associated users
        
        return new PostResource($post);
    }

    public function update(Request $request, Post $post)
    {
        $post->update($request->all());
        return new PostResource($post);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return response()->json(null, 204);
    }
}
