<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserPost;
use App\Models\PostComments;
use Auth;

class PostController extends Controller
{
    


    // Storing new post

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


    // Showing all posts, paginated 
    public function show()
    {
        $post = UserPost::simplePaginate(4);
        return view('posts.postfeed')->with('post', $post);
    }

    
    // Showing individual post, by ID
    public function showindpost($id)
    {
        $indpost = UserPost::find($id);
        $postcomments = PostComments::where('postid', $id)->get();
        return view('posts.indpost', ['indpost' => $indpost, 'postcomments' => $postcomments]);
    }




    // Storing new comment

    public function storecomment(Request $commentrequest)
    {
        $commentrequest->validate([
            'content' => 'required',
        ]);

        $NewComment = new PostComments();
        $NewComment->commentor = Auth::user()->name;
        $NewComment->content = $commentrequest->input('content');
        $NewComment->postid = $commentrequest->input('postid');
        $NewComment->save();

        return redirect()->back()->with('status', 'Comment Submitted');

    }



}
