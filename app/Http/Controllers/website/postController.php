<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
class postController extends Controller
{
    public function show(Post $Post){
        //$post1 
        //$post = Post::find($Post1);
       // return dd($post);
        return view('website.post',compact('Post'));
    }
}

