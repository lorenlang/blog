@extends('master')

@section('content')

    <div id="image-wrapper">
        <img class="img-responsive" src="{{ $post->image }}" alt="">
        {{--<span class="image-credit">{{ $post->image_credit }}</span>--}}
    </div>
    <h2 id="page-title">{{ $post->title }}</h2>
    <article>
        <div class="publish-date">{{ $post->published_at }}</div>
        <div class="post-body">{{ $post->body }}</div>
    </article>

@stop