<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::whereBetween('category_id', [5,9])->paginate(6);
        return view('pages.index',['posts' => $posts]);
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        return view('pages.show', ['post' => $post]);
    }

    public function category($slug)
    {
        $category = Category::where('slug',$slug)->firstOrFail();
        $posts = $category->posts()->paginate(4);
        return view('pages.list', ['posts' => $posts, 'category'=> $category]);
    }
}
