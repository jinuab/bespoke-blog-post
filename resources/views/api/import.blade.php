@extends('layouts.app-master')

@section('content')
<!-- Message -->
@if(Session::has('message'))
    <p >{{ Session::get('message') }}</p>
@endif
<h1>Import CSV page</h1>
<!-- import -->
<form method='post' action='./uploadFile' enctype='multipart/form-data' >
    {{ csrf_field() }}
    <input type='file' name='file' >
    <input type='submit' name='submit' value='Import'>
</form>
@endsection
