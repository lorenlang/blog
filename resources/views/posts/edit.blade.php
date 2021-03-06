@extends('master')

@section('title')
    Edit Post |
@stop

@section('content')

    <h1>Edit blog post: {!! $post->title !!}</h1>

    <hr/>

    @include('posts/partials/messages')

    {!! Form::model($post, ['method' => 'PATCH', 'url' => 'posts/'.$post->id]) !!}

    @include('posts/partials/form', ['action' => 'edit', 'pubDate' => null])

    {!! Form::close() !!}

@stop