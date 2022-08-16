<?php

namespace App\Http\Controllers;
use Session;
use App\Models\BlogPost;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogCrudAPIController extends Controller
{
    /**
     * @return View
     */
    public function index()
    {
        $posts = BlogPost::all(); //fetch all blog posts from DB
        return view('api/blogPost', [
            'user' => Auth::id(),
            'posts' => $posts,
            ]);
    }

    public function showAllPosts()
    {
        return response()->json(BlogPost::all());
    }

    public function showOnePost($id)
    {
        return response()->json(BlogPost::find($id));
    }

    public function createPost(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
        ]);

        $blogPost = BlogPost::create($request->all());

        return response()->json($blogPost, 201);
    }

    public function updatePost($id, Request $request)
    {
        $blogPost = BlogPost::findOrFail($id);
        $blogPost->update($request->all());

        return response()->json($blogPost, 200);
    }

    public function deletePost($id)
    {
        BlogPost::findOrFail($id)->delete();
        return response('Post deleted Successfully', 200);
    }
}
