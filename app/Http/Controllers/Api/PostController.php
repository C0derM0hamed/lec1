<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::with('user')
            ->withTrashed()
            ->paginate(10);

        return PostResource::collection($posts);
    }


    public function show(Post $post)
    {
        $post->load('user');
        return new PostResource($post);
    }

    public function store(StorePostRequest $request)
    {
        $post = Post::create([
            'title' => $request->validated()['title'],
            'content' => $request->validated()['content'],
            'image' => $request->validated()['image'] ?? null,
            'user_id' => $request->user()->id,
        ]);

        return new PostResource($post->load('user'));
    }
}

