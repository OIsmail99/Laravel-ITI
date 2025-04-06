<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

class PostController extends Controller
{


    function index()
    {
        $posts = Post::all();

        return view('posts.index', ['posts' => $posts]); //passing posts to the view
    }


    function show($id)
    {
        $post = Post::find($id);
        if (!$post) {
            abort(404);
        }
        return view('posts.show', ['post' => $post,]);
    }

    function delete($id)
    {
        $post = Post::find($id);
        if (!$post) {
            abort(404);
        }
        $post->delete();
        return to_route('posts.index');
        // $posts = session('posts', self::$posts);
        // $filteredPosts = [];
        // foreach ($posts as $post) {
        //     if ($post['id'] != $id) {
        //         $filteredPosts[] = $post;
        //     }
        // }
        // session(['posts' => $filteredPosts]);

        // return redirect()->route('posts.index');
    }

    function create()
    {
        $users = User::all();
        return view('posts.create', ['users' => $users]);
    }

    function store()
    {
        //TODO what if a post was created by a non-existing user?
        //TODO user names & emails should appear as dropdown.
        //TODO what if mismatch between username and email?
        $post = new Post();
        $post->title = request('title');
        $post->description = request('description');
        $post->user_id = User::where('email', request('email'))->first()->id;
        $post->save();
        return to_route("posts.index");
    }
    function edit($id)
    {
        $post = Post::find($id);
        if (!$post) {
            abort(404);
        }
        return view('posts.edit', ['post' => $post]);
    }

    function update($id)
    {
        // $posts = session('posts', self::$posts);
        // $post = null;
        // $index = 0;
        // for ($i = 0; $i < count($posts); $i++) {
        //     if ($posts[$i]['id'] == $id) {
        //         $post = $posts[$i];
        //         $index = $i;
        //         break;
        //     }
        // }
        // if (!$post) {
        //     abort(404);
        // }
        // $post['title'] = request('title');
        // $post['posted_by'] = request('posted_by');
        // $post['email'] = request('email');
        // $posts[$index] = $post;
        // session(['posts' => $posts]);
        // return redirect()->route('posts.index');
    }

}
