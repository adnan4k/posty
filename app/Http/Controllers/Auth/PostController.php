<?php

namespace App\Http\Controllers\Auth;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    //

    public function index(){
       $posts = Post::paginate(3);
        return view('posts.index',
    ["posts" =>$posts]

);
    }

    public function store(Request $request){
        $this->validate($request,[    //    dd(["posts" =>$posts]);

            'body'=>'required'
        ]);
         

         $request->user()->posts()->create([
            'body' => $request->body
        ]);    

      return back();
    }

    public function destroy(Post $post,Request $request){
        
       $post->delete();
        // dd($post);

        return back();
    }
}
