<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Str;
use App\Jobs\PruneOldPostsJob;

class PostController extends Controller
{


    public function index()
    {

        $posts = Post::simplePaginate(5);
        return view('posts.index', ['posts' => $posts]); //passing posts to the view
    }


    public function show($slug)
    {
        $post = Post::withTrashed()->where('slug', $slug)->first();
        if (!$post) {
            abort(404);
        }
        return view('posts.show', ['post' => $post,]);
    }

    public function showDeleted()
    {
        $posts = Post::onlyTrashed()->simplePaginate(5);
        return view('posts.soft', ['posts' => $posts]);
    }

    public function delete($id)
    {
        $post = Post::find($id);
        if (!$post) {
            abort(404);
        }
        $post->delete();
        return to_route('posts.index');
    }

    public function create()
    {
        $users = User::all();
        return view('posts.create', ['users' => $users]);
    }

    public function store(StorePostRequest $request)
    {
        //TODO what if a post was created by a non-existing user?
        //TODO user names & emails should appear as dropdown.
        //TODO what if mismatch between username and email?
        $post = new Post();
        $post->title = request()->title;
        $post->description = request()->description;
        $post->user_id = Auth::user()->id;
        $post->slug = Str::slug(request()->title);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Store the image in the public/storage/images directory
            $imagePath = $request->file('image')->store('images', 'public');
            // Save the full path to the database
            $post->image = $imagePath;
        }

        $post->save();
        return to_route("posts.index");
    }
    public function restore($id)
    {
        $post = Post::withTrashed()->find($id);
        if (!$post) {
            abort(404);
        }
        $post->restore();
        return to_route("posts.soft");
    }

    public function edit($id)
    {
        $post = Post::find($id);
        if (!$post) {
            abort(404);
        }
        return view('posts.edit', ['post' => $post]);
    }

    public function update(UpdatePostRequest $request, $id)
    {
        $post = Post::find($id);
        $post->title = request('title');
        $post->description = request('description');
        $post->slug = Str::slug(request('title'));
        $post->save();
        return to_route('posts.index');
    }

}
