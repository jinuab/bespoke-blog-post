@extends('layouts.app-master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                <div class="row">
                    <div class="col-8">
                        <h1 class="display-one">Bespoke Blog!</h1>
                        <p>Enjoy reading our posts. Click on a post to read!</p>
                    </div>
                    @auth
                        <div class="col-4">
                            <p>Create new Post</p>
                            <a href="/blog/create/post" class="btn btn-primary btn-sm">Add Post</a>
                        </div>
                        <div class="col-8">
                            <a href="/api/import" class="btn btn-outline-success btn-sm">Import CSV</a>
                        </div>
                    @endauth
                </div>

                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        @auth
                            <th scope="col">Post ID</th>
                        @endauth
                        <th scope="col">Blog Title</th>
                        <th scope="col">Created by(Username)</th>
                        <th scope="col">Created datetime</th>
                        @auth
                            <th scope="col">Actions</th>
                        @endauth
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($posts as $key => $post)
                        <tr>
                            <th scope="row">{{ ++$key }}</th>
                            @auth
                                <td>{{ $post->id }}</td>
                            @endauth
                            <td>
                                <a href="./blog/{{ $post->id }}">{{ ucfirst($post->title) }}</a>
                            </td>
                            <td>{{ json_decode($post->user_id)->username || '' }}</td>
                            <td>{{ $post->created_at }}</td>
                            @auth
                                <td>
                                    @if ($loggedUser_id == json_decode($post->user_id)->id)
                                        <a href="/blog/{{ $post->id }}/edit" class="btn btn-outline-primary">Edit Post</a>
                                        <form id="delete-frm" class="" action="./blog/delete/{{ $post->id }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger">Delete Post</button>
                                        </form>
                                    @else
                                        -
                                    @endif
                                </td>
                            @endauth
                        </tr>
                    @empty
                        <tr>
                            <td><p class="text-warning">No blog Posts available</p></td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
