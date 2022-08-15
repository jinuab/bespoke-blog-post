@extends('layouts.auth-master')

@section('content')
    <div class="row pt-4 pb-4 m-auto text-center w-50">
        <h1 class="text-center">Visit Home page as Guest</h1>
        <a class="btn btn-outline-success shadow ml-3 font-weight-bold align-content-center" href="/home">View Blogs</a>
    </div>
    <form method="post" action="{{ route('login.perform') }}">

        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <h1 class="h3 mb-3 fw-normal">Login</h1>

        @include('layouts.partials.messages')

        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Username" required="required" autofocus>
            <label for="floatingName">Email or Username</label>
            @if ($errors->has('username'))
                <span class="text-danger text-left">{{ $errors->first('username') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3">
            <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Password" required="required">
            <label for="floatingPassword">Password</label>
            @if ($errors->has('password'))
                <span class="text-danger text-left">{{ $errors->first('password') }}</span>
            @endif
        </div>

        <button class="w-50 btn btn-lg btn-primary" type="submit">Login</button>

        <div class="pt-5">
            <p>Not registered yet? please click below.</p>
            <a href="{{ route('register.perform') }}" class="btn btn-warning w-50">Sign-up</a>
        </div>

        <p class="mt-5 mb-3 text-muted">{{ config('app.name') }} &copy; {{date('Y')}}</p>
    </form>
@endsection
