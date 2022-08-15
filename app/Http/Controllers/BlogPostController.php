<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\BlogPostComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogPostController extends Controller
{
    public function index()
    {
        $posts = BlogPost::all(); //fetch all blog posts from DB

        if(Auth::check())
        {
            $loggedUser_id = Auth::user()->id;
        }
        else
        {
            $loggedUser_id = '';
        }

        return view('blog.index', [
            'posts' => $posts,
            'loggedUser_id' => $loggedUser_id
        ]); //returns the view with posts
    }

    public function create()
    {
        return view('blog.create'); //show form to create a blog post
    }

    public function store(Request $request)
    {
        if(Auth::user())
        {
            $userId = Auth::user();
        } else {
            $userId = 1;
        }

        $newPost = BlogPost::create([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => $userId
        ]);

        return redirect('blog/' . $newPost->id);
    }

    public function addComment(Request $request)
    {
        BlogPostComment::create([
            'post_id' => $request->id,
            'name' => $request->guest_name,
            'comment' => $request->comment
        ]);

        return redirect('blog/' . $request->id);
    }

    public function show(BlogPost $blogPost)
    {
        $comments = BlogPostComment::where('post_id','=',$blogPost->id)->get(); // fetch all comments from DB
        $user_details = json_decode($blogPost->user_id);

        return view('blog.viewDetails', [
            'post' => $blogPost,
            'user_details' => $user_details,
            'comments' => $comments
        ]); //returns the view with the post
    }

    public function edit(BlogPost $blogPost)
    {
        $post_user_id = json_decode($blogPost->user_id)->id;

        if($post_user_id != Auth::user()->id)
        {
            $allowEdit = 'No';
        }
        else
        {
            $allowEdit = 'Yes';
        }

        return view('blog.edit', [
            'post' => $blogPost,
            'postOwnerId' => $post_user_id,
            'allowEdit' => $allowEdit,
        ]); //returns the edit view with the post
    }

    public function update(Request $request, BlogPost $blogPost)
    {
        //save the edited post
        $blogPost->update([
            'title' => $request->title,
            'body' => $request->body
        ]);

        return redirect('blog/' . $blogPost->id);
    }

    public function destroy(BlogPost $blogPost)
    {
        //delete a post
        $blogPost->delete();

        return redirect('/blog');
    }
}
