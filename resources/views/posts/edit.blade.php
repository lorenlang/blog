@extends('master')

@section('content')

    <h1>Edit blog post: {!! $post->title !!}</h1>

    <hr/>

    @include('posts/partials/messages')

    {!! Form::model($post, ['method' => 'PATCH', 'url' => 'posts/'.$post->id]) !!}

    @include('posts/partials/form', ['pubDate' => null])

    {!! Form::close() !!}

@stop