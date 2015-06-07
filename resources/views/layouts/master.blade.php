<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BeActive</title>
	

    {!! Html::style('css/bootstrap.min.css') !!}
    {!! Html::style('css/style.css') !!}
	{!! Html::style('//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css') !!}
	<!-- full calendar css-->
    {!! Html::style('fullcalendar/bootstrap-fullcalendar.css') !!}
	{!! Html::style('fullcalendar/fullcalendar.css') !!}
	<!-- full calendar css-->
	@yield('head')
</head>
<body>

    @include('partials.navbar')
	<div class="padding"> 
    <div class="container">
        @yield('content')
    </div>
	</div>

   @include('partials.footer')

{!! Html::script('js/jquery.min.js') !!}
{!! Html::script('js/bootstrap.min.js') !!}
{!! Html::script('js/script.js') !!}

@yield('scripts')
</body>

</html>