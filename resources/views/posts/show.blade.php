@extends('master')

@section('content')

    <h2 id="page-title">{{ $post->title }}</h2>
    <article>
        <div class="post-body">{{ $post->body }}</div>
    </article>

@stop