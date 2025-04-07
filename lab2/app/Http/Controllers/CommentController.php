<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\User;
use App\Models\Post;

class CommentController extends Controller
{
    public function index($postId)
    {
        $post = Post::find($postId);
        $comments = Comment::where("post_id", $postId)->get();
        return view("comments.index", ['comments' => $comments, 'post' => $post]);
    }

    public function delete($commentId)
    {
        $comment = Comment::find($commentId);
        $post = $comment->post;
        $comment->delete();
        return to_route('comments.index', $post->id);
    }

    public function create($postId)
    {
        $post = Post::find($postId);
        return view('comments.create', ['post' => $post]);
    }

    public function store($postId)
    {
        $post = Post::find($postId);
        $comment = new Comment();
        $comment->user_id = auth()->id() ?? 1;
        $comment->post_id = $postId;
        $comment->content = request('content');
        $comment->save();

        return to_route('comments.index', $post->id);
    }

    public function edit($commentId)
    {
        $comment = Comment::find($commentId);
        if (!$comment) {
            abort(404);
        }
        return view('comments.edit', ['comment' => $comment]);
    }

    public function update($commentId)
    {
        $comment = Comment::find($commentId);
        if (!$comment) {
            abort(404);
        }

        $comment->content = request('content');
        $comment->save();

        return to_route('comments.index', $comment->post_id);
    }
}
