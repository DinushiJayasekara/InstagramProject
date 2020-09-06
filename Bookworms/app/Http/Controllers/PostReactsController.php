<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostReactsController extends Controller
{
    public function store(Post $post)
    {
        $post->react(auth()->user());
        return back();
    }
    
    public function destroy(Post $post)
    {
        $post->unReact(auth()->user());
        return back();
    }
}
