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
                    <li><a href="{{ url( '/posts/' . $post->slug . '/edit' ) }}"><i class="fa fa-edit fa-2x"></i></a>
                    </li>
                </ul>
            @endif

            @if($post->shareLinks())
                <ul class="pull-right list-inline share-links">
                    <?php $x = 0; ?>
                    @foreach($post->shareLinks() as $key =>$share)
                        <li><a href="{{ $share }}"> <i class="fa fa-{{ $key }}"></i> </a></li>
                        @if(++$x == 4)
                </ul>
                <ul class="pull-right list-inline share-links">
                    @endif
                    @endforeach
                </ul>
            @endif

            <p class="publish-date">{{ $post->published_at->format('F d, Y') }}</p>
            {{--<p class="publish-date">{{ $post->published_at }}</p>--}}

        </div>

        <div class="post-body">{!! TextHelper::renderMarkdown($post->body) !!}</div>
    </article>

    @if($post->previous())
        <div id="prev-link" class="pull-left">
            <a href="{{ url('posts', $post->previous()->slug) }}">
                <<&nbsp;&nbsp;{{ $post->previous()->title }}
            </a>
        </div>
    @endif

    @if($post->next())
        <div id="next-link" class="pull-right">
            <a href="{{ url('posts', $post->next()->slug) }}">
                {{ $post->next()->title }}&nbsp;&nbsp;>>
            </a>
        </div>
    @endif

@stop