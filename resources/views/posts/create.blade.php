@extends('master')

@section('content')

    <h1>Create new blog post</h1>

    <hr/>

    @include('posts/partials/messages')

    {!! Form::open(['url' => 'posts', 'files' => true]) !!}

    @include('posts/partials/form', ['action' => 'create', 'pubDate' => $now])

    {!! Form::close() !!}

@stop