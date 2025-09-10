<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Builder\Function_;
class PostController extends Controller
{
    public function index (){

        $postsFromDB = Post::paginate(6);

        return view('posts.index',['posts' =>$postsFromDB]);

    }

public function show(Post $post){

    return view('posts.show' ,['post' => $post]);
}

public function create()  {

    $users = User::all();
    return view('posts.create',['users'=>$users]);

}

public function store(Request $request){

    request()->validate([
        'title' => ['required','min:5'],
        'description' => ['required','min:5'],
        'post_creator' => ['required','exists:users,id']
    ]);

    $title = request()->title ;
    $description = request()->description ;
    $post_creator = request()->post_creator ;

    Post::create([
        'title' => $title,
        'description' => $description,
        'user_id' => $post_creator
    ]);

    return to_route("posts.index")->with('success', 'Post created successfully!');;
}

public function edit(Post $post){

        $users = User::all();

    return view('posts.edit',['users'=>$users , 'post'=>$post]);
}

public function update($postID){

        request()->validate([
        'title' => ['required','min:5'],
        'description' => ['required','min:5'],
        'post_creator' => ['required','exists:users,id']
    ]);

    $title = request()->title ;
    $description = request()->description ;
    $post_creator = request()->post_creator ;

    $singlePost = Post::find($postID);
    $singlePost->update([
        'title'=>$title,
        'description'=>$description,
        'user_id' => $post_creator

    ]);

    return to_route('posts.show',$postID)->with('success', 'Post updated successfully!');;

}

public function destroy($postID){

    $post = Post::find($postID);
    $post->delete();

    return to_route('posts.index')->with('success', 'Post deleted successfully!');;
}

}


