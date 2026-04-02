<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    function index(){
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }


    function show($id){
        $post = Post::findOrFail($id);
        return view('posts.view', compact('post'));
    }   


    function create(){
        return view('posts.create');
    }
    
    
    function store(Request $request){
  
        $validated = $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        Post::create($validated);

        return redirect('/posts')->with('success','Post created successfully');
    }

    function edit($id){
         $post=Post::findOrFail($id);
         return view('posts.edit', compact('post'));
    }

    function update($id,Request $request){

            $validated = $request->validate([
            'title'=>'required|string',
            'content'=>'required|string'
         ]);

         $post = Post::findOrFail($id);

            $post->update($validated);

            return redirect('/posts')->with('success', 'Post updated successfully');
    }

    function destroy($id){
        $post = Post::findOrFail($id);

        $post->delete();

        return redirect('/posts')->with('success', "Post deleted successfully");
    }

}
