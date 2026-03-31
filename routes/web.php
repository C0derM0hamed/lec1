<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

$posts = [];

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create', function(){
 
return view('posts.create');

});

Route::post('/store',function(Request $request){

session()->push('posts',[
'id' => count(session('posts', [])),
'title'=>$request['title'],
'body'=>$request['body']
]);
    return redirect('/posts');
});


Route::get('/posts', function () {
    $posts = session('posts', []);
    return view('posts.list',compact('posts'));
});

Route::get('/post/{id}', function ($id) {
    $posts = session('posts',[]);
    $post = $posts[$id] ?? null;
    return view('posts.view', ['post'=>$post]);
});

