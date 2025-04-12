<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Resources\PostResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index(){
        $posts = Post::with('user')->get();
        return PostResource::collection($posts);
    }

    public function show($slug){
        $post = Post::with('user')->where('slug', $slug)->first();
        return new PostResource($post);
    }

    public function store(StorePostRequest $request){
        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->slug = Str::slug($request->title);
        $post->user_id = Auth::id() ?? 1;
        $post->image = null;
        $post->save();
        return $post;
        // $post = Post::create($request->all());
        // return $post;
    }
}
