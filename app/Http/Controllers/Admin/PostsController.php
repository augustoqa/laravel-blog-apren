<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title'    => 'required',
            'body'     => 'required',
            'category' => 'required',
            'excerpt'  => 'required',
            'tags'     => 'required',
        ]);

        // return Post::create($request->all());
        $post = new Post;
        $post->title = $request->get('title');
        $post->body = $request->get('body');
        $post->excerpt = $request->get('excerpt');
        $post->published_at = $request->get('published_at') ? Carbon::parse($request->get('published_at')) : null;
        $post->category_id = $request->get('category');
        $post->save();
        // etiquetas
        $post->tags()->attach($request->get('tags'));

        return back()->with('flash', 'Tu publicación ha sido creada');
    }
}
