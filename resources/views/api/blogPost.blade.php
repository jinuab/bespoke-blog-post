@extends('layouts.app-master')
@section('content')
    <div class="container">
        <div class="row col-12">
            <h1 >Welcome to Blog Post API calls</h1>
            @if($posts)
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Post ID</th>
                        <th scope="col">Blog Title</th>
                        <th scope="col">Created by(Username)</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse($posts as $key => $post)
                            <tr>
                                <th scope="row">{{ ++$key }}</th>
                                <td>{{ $post->id }}</td>
                                <td>
                                    <a href="./blog-post/{{ $post->id }}">{{ ucfirst($post->title) }}</a>
                                </td>
                                <td>{{ json_decode($post->user_id)->username }}</td>
                                <td>
                                    <form id="delete-frm" class="" action="./blog-post/delete/{{ $post->id }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger">Delete Post</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td><p class="text-warning">No blog Posts available</p></td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
