<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class StaticController extends Controller
{
    public function home()
    {

        $lastpost = Post::orderBy('created_at', 'DESC')->first();
        $allCategoury = Category::all();
        return view('index', compact('lastpost', 'allCategoury'));
    }

    public function category_page(string $categury)
    {
        $Categoryrow = Category::where('name', str_replace('-', ' ', $categury))->first();
        $name = $Categoryrow->name;
        $Posts = Post::where('category_id', $Categoryrow->id)->get();
        return view('blog.category', compact('Posts', 'name'));
    }
}
