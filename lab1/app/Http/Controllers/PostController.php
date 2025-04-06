<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public static array $posts = [ //array of arrays
        ['id' => 1, 'title' => 'Awesome Post', 'posted_by' => 'Osama', 'email' => "osama@gmail.com", 'created_at' => '2025-12-10 10:00:00'],
        ['id' => 2, 'title' => 'Amazing Post', 'posted_by' => 'Mohammed', 'email' => "mohammed@gmail.com", 'created_at' => '2025-10-10 10:00:00'],
        ['id' => 3, 'title' => 'Terrible Post', 'posted_by' => 'Ahmad', 'email' => "ahmad@gmail.com", 'created_at' => '2025-9-10 10:00:00']
    ];




    function index()
    {

        if (!session()->has('posts')) {
            session(['posts' => self::$posts]);
        }

        return view('posts.index', ['posts' => session('posts')]); //passing session posts to the view

    }

    //TODO! functions can be defined automatically while creating the controller.
    function show($id)
    {
        $posts = session('posts', self::$posts);
        $post = null;
        for ($i = 0; $i < count($posts); $i++) {
            if ($posts[$i]['id'] == $id) {
                $post = $posts[$i];
                break;
            }
        }
        if (!$post) {
            abort(404);
        }
        return view('posts.show', ['post' => $post,]);
    }

    function delete($id)
    {
        $posts = session('posts', self::$posts);
        $filteredPosts = [];
        foreach ($posts as $post) {
            if ($post['id'] != $id) {
                $filteredPosts[] = $post;
            }
        }
        session(['posts' => $filteredPosts]);
        //TODO! use array filter function
        return redirect()->route('posts.index');
    }

    function create()
    {
        return view('posts.create');
    }

    function store()
    {
        $posts = session('posts', self::$posts);
        $newPost = [];
        $newPost['id'] = count($posts) + 15;
        $newPost['title'] = request('title');
        $newPost['posted_by'] = request('posted_by');
        $newPost['email'] = request('email');
        $newPost['created_at'] = date('Y-m-d H:i:s');
        $posts[] = $newPost;
        session(['posts' => $posts]);
        return redirect()->route('posts.index');
    }
    function edit($id)
    {
        $posts = session('posts', self::$posts);
        $post = null;
        for ($i = 0; $i < count($posts); $i++) {
            if ($posts[$i]['id'] == $id) {
                $post = $posts[$i];
                break;
            }
        }
        if (!$post) {
            abort(404);
        }
        return view('posts.edit', ['post' => $post]);
    }

    function update($id)
    {
        $posts = session('posts', self::$posts);

        $post = null;
        $index = 0;
        for ($i = 0; $i < count($posts); $i++) {
            if ($posts[$i]['id'] == $id) {
                $post = $posts[$i];
                $index = $i;
                break;
            }
        }
        if (!$post) {
            abort(404);
        }
        $post['title'] = request('title');
        $post['posted_by'] = request('posted_by');
        $post['email'] = request('email');
        $posts[$index] = $post; //swapping
        session(['posts' => $posts]);
        return redirect()->route('posts.index');
    }

}
