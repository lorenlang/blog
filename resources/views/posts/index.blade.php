@extends('master')

@section('content')

    @foreach($posts as $post)

        <div class="row">
            <br>

            <div class="col-md-2 col-sm-3 text-center">
                <a class="story-img" href="#"><img src="//placehold.it/100" style="width:100px;height:100px"
                                                   class="img-circle"></a>
            </div>
            <div class="col-md-10 col-sm-9">
                <h3><a href="{{ url('posts', $post->slug) }}">{{ $post->title }}</a></h3>

                <div class="row">
                    <div class="col-xs-9">
                        <p>{{ $post->body }}</p>

                        <p class="lead">

                            @include('posts/partials/share')

                            <a href="{{ url('posts', $post->slug) }}" class="btn btn-default pull-right" role="button">Read More</a>
                        </p>
                        <p class="pull-right">
                            @foreach($post->tags as $tag)
                                <span class="label label-default">{{ $tag->name }}</span>
                            @endforeach
                        </p>
                        <ul class="list-inline">
                            <li><a href="#">{{ $post->published_at->diffForHumans() }}</a></li>
                            <li><a href="#"><i class="glyphicon glyphicon-comment"></i> 4 Comments</a></li>
                            <li><a href="#"><i class="glyphicon glyphicon-share"></i> 34 Shares</a></li>
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