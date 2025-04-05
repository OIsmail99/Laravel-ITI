<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller {
    public static array $posts = [ //array of arrays
        ['id' => 1 , 'title' => 'Awesome Post', 'posted_by' => 'Osama', 'email' => "osama@gmail.com", 'created_at' => '2025-12-10 10:00:00'],
            ['id' => 2 , 'title' => 'Amazing Post','posted_by' => 'Mohammed', 'email' => "mohammed@gmail.com", 'created_at' => '2025-10-10 10:00:00'],
            ['id' => 3 , 'title' => 'Terrible Post','posted_by' => 'Ahmad', 'email' => "ahmad@gmail.com", 'created_at' => '2025-9-10 10:00:00']
    ];


    function index(){

        if (!session()->has('posts')) {
            session(['posts' => self::$posts]);
        }

        return view('posts.index', ['posts' => session('posts')]); //passing session posts to the view
    }


    function show($id){
        $posts = session('posts', self::$posts);
        $post = null;
        for($i = 0; $i < count($posts); $i++){
            if($posts[$i]['id'] == $id){
                $post = $posts[$i];
                break;
            }
        }
        if(!$post){
            abort(404);
        }
        return view('posts.show', ['post' => $post, ]);
    }

    function delete($id){
        $posts = session('posts', self::$posts);
        $filteredPosts = [];
        foreach($posts as $post){
            if($post['id'] != $id){
                $filteredPosts[] = $post;
            }
        }
        session(['posts' => $filteredPosts]);

        return redirect()->route('posts.index');
    }

function create(){
    return view('posts.create');
}

function store(){
    $posts = session('posts', self::$posts);
    $newPost = [];
    $newPost['id'] = count($posts) + 15;
    $newPost['title'] = request('title');
    $newPost['posted_by'] = request('post_creator');
    $newPost['email'] = request('email');
    $newPost['created_at'] = date('Y-m-d H:i:s');
    $posts[] = $newPost;
    session(['posts' => $posts]);
    return redirect()->route('posts.index');
}

        // if(!$post){
        //     abort(404);
        // }

        //return redirect('/posts'); //redirect to the index page after deleting the post
}
