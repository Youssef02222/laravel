<?php

namespace App\Http\Controllers;

use App\Models\Comment;
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
      //  $comments=Comment::all();

    }

    public function comment(){

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
    public function createComment(){
        $comments = Comment::all();
        $users = User::all();
        return view('posts.comment', ['comments'=> $comments,'users'=> $users]);
    }


    public function new1($id){
        $comments = Comment::all();
        $users = User::all();
        $post_id=$id;
        return view('posts.new',['comments'=> $comments,'users'=> $users , 'post_id'=>$post_id],);
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




    public function storeComment(){
        $data = request()->all();


            Comment::create([
                'comment' => $data['addcomm'],
                'user_id'=>$data['post_creator'],
                'post_id'=>$data['id'],




            ]);

        return redirect()->route('posts.index');
    }




    public function show($postId){
        $post = Post::find($postId);
        $comments=Comment::all();
        return view('posts.show',
            ['post'=> $post,
                'comments'=>$comments


            ]);

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
