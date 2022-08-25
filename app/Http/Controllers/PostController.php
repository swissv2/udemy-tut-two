<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(6);
        //$posts = Post::all();

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        //add permissions
        $this->authorize('create', Post::class);
        //show view of post
        return view('posts.create');
    }

    public function store(Request $request)
    {
       //authorize the store
        $this->authorize('create', Post::class);

        $validated = $request->validate(['title' => 'required', 'body' => 'required']);
        Post::create($validated);

        return to_route('posts.index')->with('message', 'New post added to database.');
    }

    public function edit(User $user, Post $post)
    {
        //add permissions
        $this->authorize('update', Post::class);

        return view('posts.edit', compact('post'));
    }

    //create a simple view of the page

    public function show(User $user, Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        //add permissions
        $this->authorize('update', Post::class);   

        $validated = $request->validate(['title' => 'required', 'body' => 'required']);
        $post->update($validated);

        return to_route('posts.index')->with('message', 'Post updated in database.');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return to_route('posts.index')->with('message', 'Post deleted from database.');
    }


}
