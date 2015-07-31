<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
        <title>@yield('title') Where's My Head?</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link href="{{URL::asset('css/bootstrap.min.css')}}" rel="stylesheet">
		<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
        <link href="{{URL::asset('css/styles.css')}}" rel="stylesheet">
        <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet"/>
	</head>
	<body>

    @include('partials/header')

<div id="masthead">
  <div class="container">
    <div class="row">
      {{--<div class="col-md-7">--}}
      <div class="col-md-12">
        <h1>Where's My Head?
          <p class="lead">Mom always said I'd lose it...</p>
        </h1>
      </div>
{{--
      <div class="col-md-5">
        <div class="well well-lg">
          <div class="row">
            <div class="col-sm-12">
              Ad Space
            </div>
          </div>
        </div>
      </div>
--}}
    </div>
  </div><!-- /cont -->


</div>


<div class="container">
  <div class="row">

      <div class="col-md-12">

          <div class="panel">
        <div class="panel-body">


            {{--@include('partials/flash')--}}
            @include('flash::message')

            @yield('content')


          {{--<a href="/" class="btn btn-primary pull-right btnNext">More <i class="glyphicon glyphicon-chevron-right"></i></a>--}}


        </div>
      </div>

   	</div><!--/col-12-->
  </div>
</div>


<hr>

{{--
<div class="container" id="footer">
  <div class="row">
    <div class="col col-sm-12">

      <h4>Follow me</h4>
      <div class="btn-group">
       <a class="btn btn-twitter btn-lg" href="#"><i class="icon-twitter icon-large"></i> Twitter</a>
	   <a class="btn btn-facebook btn-lg" href="#"><i class="icon-facebook icon-large"></i> Facebook</a>
	   <a class="btn btn-google-plus btn-lg" href="#"><i class="icon-google-plus icon-large"></i> Google+</a>
	   <a class="btn btn-linkedin btn-lg" href="#"><i class="icon-linkedin icon-large"></i> LinkedIn</a>
      </div>

    </div>
  </div>
</div>

<hr>
--}}

    @include('partials/footer')

	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <script src="{{URL::asset('js/bootstrap.min.js')}}"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>

        <script>
            $('#flash-overlay-modal').modal();
            $('div.alert').not('.alert-important').delay(3000).slideUp(300);
        </script>
    @yield('scripts')
    @include ('/partials/piwik')

	</body>
</html>