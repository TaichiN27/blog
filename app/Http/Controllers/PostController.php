<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest; // useする
use App\Models\Post;

class PostController extends Controller
{
    public function index(Post $post){
        return view('posts/index')->with(['posts' => $post->getPaginatetByLimit(1)]);  
    }
    
    public function show(Post $post) {
        return view('posts/show')->with(['post' => $post]);
    }
    
    public function create()
    {
        return view('posts/create');
    }
    
    public function store(Post $post, PostRequest $request) // 引数をRequestからPostRequestにする
    {
        $input = $request['post'];
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }
}
