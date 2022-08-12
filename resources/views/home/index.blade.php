@extends('layouts.app-master')

@section('content')
    @auth
        <div class="container bg-light p-5 rounded">
            <div class="row">
                <div class="col-12 text-center pt-5">
                    <h1 class="display-one mt-5">{{ config('app.name') }}</h1>
                    <p>This awesome blog has many posts, click the button below to see them</p>
                    <br>
                    <a href="/blog" class="btn btn-outline-primary">Show Blog</a>
                </div>
            </div>
        </div>
        <p class="lead small">*Only authenticated users can access this section.</p>
    @endauth

    @guest
        <h1>Homepage</h1>
        <p class="lead">Your viewing the home page. Please login to view the restricted data.</p>
    @endguest
@endsection
