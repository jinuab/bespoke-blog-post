<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogPostController extends Controller
{
    public function index()
    {
        $posts = BlogPost::all(); //fetch all blog posts from DB

        return view('blog.index', [
            'posts' => $posts,
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

    public function show(BlogPost $blogPost)
    {
        return view('blog.viewDetails', [
            'post' => $blogPost,
        ]); //returns the view with the post
    }

    public function edit(BlogPost $blogPost)
    {
        return view('blog.edit', [
            'post' => $blogPost,
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
