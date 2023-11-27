<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserPost;
use Auth;

class PostController extends Controller
{
    
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);
        
        $NewPost = new UserPost();
        $NewPost->name = Auth::user()->name;
        $NewPost->title = $request->input('title');
        $NewPost->content = $request->input('content');
        $NewPost->save();

        return redirect('dashboard')->with('status', 'Post Submitted');
    }



    public function show()
    {
        $post = UserPost::simplePaginate(4);
        return view('posts.postfeed')->with('post', $post);
    }

    
    public function showposts($id)
    {
        $indpost = UserPost::find($id);
        return view('posts.indpost', ['indpost' => $indpost]);
    }




}
