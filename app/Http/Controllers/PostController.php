<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Post {

    // public $id;
    // public $title;
    // public $posted_by;
    // public $created_at;

    // function __construct($id, $title, $posted_by, $created_at) {
    //     $this->id = $id;
    //     $this->title = $title;
    //     $this->posted_by = $posted_by;
    //     $this->created_at = $created_at;
    // }

    // static $posts = [];

    

    public static $posts = [
        ["id"=>1, "title"=>"What is Flutter?", "description"=>"Flutter is an open-source UI software development kit created by Google. It is used to develop cross platform applications for Android, iOS, Linux, Mac, Windows, Google Fuchsia, Web platform", "posted_by"=> "Ahmed", "created_at"=> '2020-02-03'],
        ["id"=>2, "title"=>"PHP topics", "description" => "PHP is a general-purpose scripting language geared towards web development. It was originally created by Danish-Canadian programmer Rasmus Lerdorf in 1994. The PHP reference implementation is now", "posted_by"=> "Ali", "created_at"=> '2021-02-02'],
        ["id"=>3, "title"=>"Web Tech", "description" => "The World Wide Web, commonly known as the Web, is an information system where documents and other web resources are identified by Uniform Resource Locators, which may be interlinked by hyperlinks, and are accessible over the Internet.", "posted_by"=> "Mohamed", "created_at"=> '2019-05-03'],
        ["id"=>4, "title"=>"Machine Learning", "description" => "Machine learning is the study of computer algorithms that can improve automatically through experience and by the use of data. It is seen as a part of artificial intelligence.", "posted_by"=> "Osama", "created_at"=> '2022-01-03']
    ];

    static function all() {
        return self::$posts;
    }

    static function find($id) {
        foreach(self::$posts as $post) {
            if($post['id'] == $id) {
                return $post;
            }
        }
    }

    static function delete($id) {
        self::$posts = array_filter(self::$posts, function($post) use($id) {
            return $post['id'] != $id;
        });
    }
}

class PostController extends Controller
{
    public function index() {
        
        return view("posts.index", [
            'posts' => Post::all()
        ]);
    }

    
   
    public function create(){
        return view('posts.create');
    }

    public function store(){
        return redirect()->route('posts.index');
    }


    public function show($postId){
        return view('posts.show', ['post'=> Post::find($postId)]);
    }

    public function edit($postId){
        return view('posts.create' , ['post'=>Post::find($postId)]);
    }


    public function destroy($postId) {
         Post::delete($postId);
        return redirect()->route('posts.index');    
    }

    


}
