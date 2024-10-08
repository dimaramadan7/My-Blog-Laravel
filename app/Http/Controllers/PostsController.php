<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File as FacadesFile;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('blog.index')->with('Posts', Post::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $categories = Category::all();
        return view('blog.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:posts,title',
            'description' => 'required',
            'image' => 'required|mimes:png,jpg,|max:6500',
            'category' => 'required'
        ]);
        $sluge = Str::slug($request->title, '-');
        $ImageName = uniqid() . '-' . $sluge . "." . $request->image->extension();
        $request->image->move(public_path('images'), $ImageName);

        Post::create(
            [
                'title' => $request->title,
                'description' => $request->description,
                'slug' => $sluge,
                'image_path' => $ImageName,
                'user_id' => auth()->user()->id,
                'category_id' => $request->category

            ]
        );
        return redirect('/blog');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('blog.show')->with('post', Post::where('slug', $id)->first());
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::all();

        return view('blog.edit', compact('categories'))->with('post', Post::where('slug', $id)->first());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {


        $request->validate([
            'title' => 'required',
            'description' => 'required',
            //'image' => 'required|mimes:png,jpg,|max:6500'
        ]);

        $sluge = Str::slug($request->title, '-');
        if (isset($request->image)) {
            FacadesFile::delete(public_path('images') . "\\" . $request->old_path);
            $ImageName = uniqid() . '-' . $sluge . "." . $request->image->extension();
            $request->image->move(public_path('images'), $ImageName);
        } else {
            $ImageName = Post::where('id', $id)->first()->image_path;
        }


        Post::where('id', $id)->update(
            [
                'title' => $request->title,
                'description' => $request->description,
                'slug' => $sluge,
                'image_path' => $ImageName,
                'user_id' => auth()->user()->id,
                'category_id' => 1

            ]
        );
        return redirect('/blog/' . $sluge)->with('massge', 'Post update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        post::where('id', $id)->delete();
        return redirect('/blog')->with('massge', 'post deleted');
    }
}
