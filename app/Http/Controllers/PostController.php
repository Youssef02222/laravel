<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        $posts = Post::withTrashed()->paginate(3);
        return view("posts.index", [
            'posts' => $posts
        ]);
    }

    public function paginate($page) {
        $per_page = 3;
        $posts = Post::withTrashed()->paginate($per_page, ['*'], 'page', $page);
        return view("posts.index", [
            'posts' => $posts
        ]);
    }



    public function create(){
        $users = User::all();
        return view('posts.create', ['users'=> $users]);
    }

    public function store(){
        $data = request()->all();
        if(isset($data['id'])) {
            Post::where('id', $data['id'])->update([
                'title' => $data['title'],
                'description' => $data['description'],
                'user_id' => $data['post_creator'],
            ]);
        } else {

            Post::create([
                'title' => $data['title'],
                'description' => $data['description'],
                'user_id' => $data['post_creator'],
            ]);
        }
        return redirect()->route('posts.index');
    }


    public function show($postId){
        $post = Post::find($postId);
        return view('posts.show', ['post'=> $post]);
    }


    public function edit($postId){
        $users = User::all();
        $post = Post::find($postId);
        return view('posts.create' , ['post'=>$post, 'users'=> $users]);
    }


    public function destroy($postId) {
        Post::where('id', $postId)->delete();
        return redirect()->route('posts.index');
    }


    public function restore($postId) {
        Post::where('id', $postId)->restore();
        return redirect()->route('posts.index');
    }

    public function force_destroy($postId) {
        Post::where('id', $postId)->forceDelete();
        return redirect()->route('posts.index');
    }




}
