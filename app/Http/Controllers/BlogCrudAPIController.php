<?php

namespace App\Http\Controllers;

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
        return view('blogAPI', ['user' => Auth::user()]);
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

    public function updateTravel($id, Request $request)
    {
        $blogPost = BlogPost::findOrFail($id);
        $blogPost->update($request->all());

        return response()->json($blogPost, 200);
    }

    public function deleteTravel($id)
    {
        BlogPost::findOrFail($id)->delete();
        return response('Travel deleted Successfully', 200);
    }
}
