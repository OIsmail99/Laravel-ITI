<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller

{
    public static array $posts = [ //array of arrays
        ['id' => 1 , 'title' => 'Awesome Post', 'posted_by' => 'Osama', 'email' => "osama@gmail.com", 'created_at' => '2025-12-10 10:00:00'],
            ['id' => 2 , 'title' => 'Amazing Post','posted_by' => 'Mohammed', 'email' => "mohammed@gmail.com", 'created_at' => '2025-10-10 10:00:00'],
            ['id' =>3 , 'title' => 'Terrible Post','posted_by' => 'Ahmad', 'email' => "ahmad@gmail.com", 'created_at' => '2025-9-10 10:00:00']
    ];
    

    function index(){

        return view('posts.index', ['posts' => self::$posts]); //passing $posts to the view
    }


    function show($id){
        $post = null;
        for($i = 0; $i < count(self::$posts); $i++){
            if(self::$posts[$i]['id'] == $id){
                $post = self::$posts[$i];
                break;
            }
        }
        if(!$post){
            abort(404);
        }
        return view('posts.show', ['post' => $post, ]);
    }
}
