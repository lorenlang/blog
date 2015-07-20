@extends('master')

@section('content')

    @foreach($posts as $post)

        <div class="row">
            <br>

            <div class="col-md-2 col-sm-3 text-center">
                <a class="story-img" href="{{ url('posts', $post->slug) }}">
                    @if($post->thumbnail)
                        <img src="{{ $post->thumbnail }}" style="width:100px;height:100px" class="img-circle">
                    @endif
                </a>
            </div>
            <div class="col-md-10 col-sm-9">
                <h3><a href="{{ url('posts', $post->slug) }}">{{ $post->title }}</a></h3>

                <div class="row">
                    <div class="col-xs-9">
                        <p>{!! $post->body !!}</p>

                        <p class="lead">

                            {{--@include('posts/partials/share')--}}

                            <a href="{{ url('posts', $post->slug) }}" class="btn btn-default pull-right" role="button">Read
                                More</a>
                        </p>

                        @unless($post->tags->isEmpty())
                            <p class="pull-right">
                                @foreach($post->tags as $tag)
                                    <span class="label label-default">{{ $tag->name }}</span>
                                @endforeach
                            </p>
                        @endunless

                        <ul class="list-inline">
                            <li>{{ $post->published_at->diffForHumans() }}</li>
                            {{--<li><a href="#"><i class="glyphicon glyphicon-comment"></i> 4 Comments</a></li>--}}
                            {{--<li><a href="#"><i class="glyphicon glyphicon-share"></i> 34 Shares</a></li>--}}
                        </ul>
                    </div>
                    <div class="col-xs-3"></div>
                </div>
                <br><br>
            </div>
        </div>
        <hr>

    @endforeach

@stop