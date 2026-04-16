<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth ;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    function index(){
        $posts = Post::withTrashed()->paginate(10);
        return view('posts.index', compact('posts'));
    }


    function show($id){
        $post = Post::findOrFail($id);
        return view('posts.view', compact('post'));
    }   


    function create(){
        return view('posts.create', [
            'users' =>User::all()
        ]);
    }
    
    
    function store(StorePostRequest $request){
/*
        $validated = $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

 $request->validate([
            'title' => 'required|unique:posts|max:255',
            'content' => 'required',
        ]);

$request->validate([
            'title' => ['required', 'unique:posts', 'max:255'],
            'content' => 'required',
        ],[
            'title.required' => 'The title field is required.',
            'title.unique' => 'The title must be unique.',
            'title.max' => 'The title may not be greater than 255 characters.',
            'content.required' => 'The content field is required.',
        ]);
*/

        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => Auth::id(),
             'image' => $request->file('image') ? $request->file('image')->store('images', 'public') : null,

        ]);

        return redirect('/posts')->with('success','Post created successfully');
    }

    function edit($id){
         $post=Post::findOrFail($id);

            return view('posts.edit', [
            'users' =>User::all(),
                 'post' => $post
         ]);
    }

    function update($id,StorePostRequest $request){

        //$post = Post::find($id);
         //$post->title = $request->title
         // $post->content = $request->content
         // $post->save()

        $post = Post::findOrFail($id);
   
        $post->update([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $request->file('image') ? $request->file('image')->store('images', 'public') : null,
        ]);

            return redirect('/posts')->with('success', 'Post updated successfully');
    }

    function destroy($id){
        $post = Post::findOrFail($id);



        $post->delete();

        // Post::destroy($id)

        return redirect('/posts')->with('success', "Post deleted successfully");
    }

    function forceDelete($id){
        $post = Post::onlyTrashed()->findOrFail($id);

        if($post->image){
        Storage::disk('public')->delete($post->image);
        }
        $post->forceDelete();

        return redirect('/posts')->with('success', "Post permanently deleted successfully");
    }

    function restore($id){
        $post = Post::onlyTrashed()->findOrFail($id);

        $post->restore();

        return redirect('/posts')->with('success', "Post restored successfully");
    }

}
