<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use Illuminate\pagination\paginator;
use links;

class categoriesController extends Controller
{
    public function show(Category $Category){

        $category = Category::find($Category);

        $category = $Category->load('childern');
        $posts = Post::where('category_id',$Category->id)->paginate(1);

        return view('website.category',compact('category','posts'));
   }

   public function show_all_categories(){
    $categories_with_posts = Category::with(['posts'=>function ($query) {
        $query->latest()->limit(2);
    }])->get();
    return view('website.all_categories',compact('categories_with_posts'));
   }
}
