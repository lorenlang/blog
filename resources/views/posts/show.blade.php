@extends('master')

@section('content')

    <img class="img-responsive" src="http://placehold.it/1100x350" alt="">
    <h2 id="page-title">{{ $post->title }}</h2>
    <article>
        <div class="post-body">{{ $post->body }}</div>
    </article>

@stop