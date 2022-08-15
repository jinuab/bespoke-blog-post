@extends('layouts.app-master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                <a href="/blog" class="btn btn-outline-primary btn-sm">
                    Go back
                </a>
                <h1 class="display-one">
                    {{ ucfirst($post->title) }}
                </h1>
                <p>
                    {!! $post->body !!}
                </p>
                <p class="small">
                    Created By: <b>{{ $user_details->username }}</b>
                    On  {!! $post->created_at !!}
                </p>
                <div class="row col-12 pt-2">
                    <form action="/blog/{{ $post->id }}" method="post">
                        @csrf
                        <div class="control-group col-12">
                            <label for="title">Your name</label>
                            <input type="text" id="guest_name" name="guest_name" class="form-control"
                                   placeholder="Enter your name" required>
                        </div>

                        <div class="control-group col-12 pt-2">
                            <label for="comment" class="">Comment</label>
                            <textarea id="comment" name="comment" class="form-control"
                                      placeholder="Enter your comment here..." required></textarea>
                        </div>

                        <div class="row mt-3 pl-3">
                            <div class="control-group col-12">
                                <button type="submit" class="btn btn-outline-success">
                                    Post
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <hr>
                <div class="col-12 row">
                    @auth
                        <a href="/blog/{{ $post->id }}/edit" class="btn btn-outline-primary">Edit Post</a>
                        <form id="delete-frm" class="" action="" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger">Delete Post</button>
                        </form>
                    @endauth
                </div>

                @include('blog.comment')
            </div>
        </div>
    </div>

    @include('layouts.partials.footer')
@endsection


