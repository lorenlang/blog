@extends('master')

@section('title')
    {{ $post->title }} |
@stop

@section('content')

    <div id="image-wrapper">
        <img class="img-responsive" src="{{ $post->image }}" alt="">
        {{--<span class="image-credit">{{ $post->image_credit }}</span>--}}
    </div>
    <h2 id="page-title">{{ $post->title }}
    </h2>
    <article>
        <div>

            @unless($post->tags->isEmpty())
                <p class="pull-right">
                    @foreach($post->tags as $tag)
                        <span class="label label-default">{{ $tag->name }}</span>
                    @endforeach
                </p>
            @endunless

                <p class="publish-date">{{ $post->published_at->format('F d, Y') }}</p>
                {{--<p class="publish-date">{{ $post->published_at }}</p>--}}

        </div>

        <div class="post-body">{!! Text::renderMarkdown($post->body) !!}</div>
    </article>

@stop