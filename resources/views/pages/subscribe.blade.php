@extends('master')

@section('title')
    Subscribe to email notifications |
@stop

@section('content')


    <h3>Sign up for email notifications</h3>

    <p></p>
    <p class='center col-sm-6 col-sm-offset-3'>
        So you say you have a fear of missing out on the latest pearls of idiocy that I feel
        compelled to inscribe in the gooey fabric of posterity? You don't want to miss out on
        whatever ramblings I lay down about life, love, my messy garage, bad TV shows, and the
        combined gross national product of Antigua and Barbuda? Well, worry no more, dear reader!
        Just enter your email address in the box below and click on the little clicky thing &mdash;
        et voilà &mdash; you will get a notification via email whenever something new is posted.
        Why anyone wants to do that is beyond me but it's your sanity. Have at it.
    </p>

    {!! Form::open(['url' => URL::to('subscribe/submit'),'method' => 'post', 'class' => 'center']) !!}

    <div class="form-group col-sm-6 col-sm-offset-3">
        {!! Form::text('email', NULL, ['placeholder' => 'Enter your E-mail address here', 'class' => 'form-control']) !!}
    </div>

    <div class="form-group col-sm-2 col-sm-offset-5">
        {!! Form::submit('Subscribe', ['class' => 'btn btn-primary form-control']) !!}
    </div>

    {!! Form::close() !!}



    {{-- Form Starts Here --}}
    {{--{!! Form::text('email',null,array('placeholder'=>'Enter your E-mail address here')) !!}--}}
    {{--{!! Form::submit('Submit!') !!}--}}

    {{--{!! Form::close() !!}--}}
    {{-- Form Ends Here --}}

    {{-- This div will show the ajax response --}}
    <div class="content"></div>

    {{--<script type="text/javascript">--}}
        {{--//Even though it's on footer, I just like to make//sure that DOM is ready--}}
        {{--$(function () {--}}
{{--//We hide de the result div on start--}}
            {{--$('div.content').hide();--}}
{{--//This part is more jQuery Related. In short, we //make an Ajax post request and get the response//back from server--}}
            {{--$('input[type="submit"]').click(function (e) {--}}
                {{--e.preventDefault();--}}
                {{--$.post('/subscribe/submit', {--}}
                    {{--email: $('input[name="email"]').val()--}}
                {{--}, function ($data) {--}}
                    {{--if ($data == '1') {--}}
                        {{--$('div.content').hide().removeClass('success error').addClass('success').html('You\'ve successfully subscribed to ournewsletter').fadeIn('fast');--}}
                    {{--} else {--}}
{{--//This part echos our form validation errors--}}
                        {{--$('div.content').hide().removeClass('success error').addClass('error').html('There has been an error occurred:<br /><br />' + $data).fadeIn('fast');--}}
                    {{--}--}}
                {{--});--}}
            {{--});--}}
{{--//We prevented to submit by pressing enter or anyother way--}}
            {{--$('form').submit(function (e) {--}}
                {{--e.preventDefault();--}}
                {{--$('input[type="submit"]').click();--}}
            {{--});--}}
        {{--});--}}
    {{--</script>--}}
@stop