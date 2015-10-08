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

            @if(Auth::check())
                <ul class="list-inline pull-right">
                    <li><a href="{{ url( '/posts/' . $post->slug . '/edit' ) }}"><i class="icon-edit icon-2x"></i></a>
                    </li>
                </ul>
            @endif

                <p class="publish-date">{{ $post->published_at->format('F d, Y') }}</p>
                {{--<p class="publish-date">{{ $post->published_at }}</p>--}}

        </div>

        <div class="post-body">{!! Text::renderMarkdown($post->body) !!}</div>
    </article>

    @if($prev)
        <div id="prev-link" class="pull-left">
            <a href="{{ url('posts', $prev->slug) }}">
                <<&nbsp;&nbsp;{{ $prev->title }}
            </a>
        </div>
    @endif

    @if($next)
        <div id="next-link" class="pull-right">
            <a href="{{ url('posts', $next->slug) }}">
                {{ $next->title }}&nbsp;&nbsp;>>
            </a>
        </div>
    @endif

@stop