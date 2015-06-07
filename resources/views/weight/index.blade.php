@extends('layouts.master')

@section('content')
	<!-- page title-->
    <h1>monitor your weight</h1> 
    <hr/>
	
	
		<a href="{{ url('/weight/create') }}" class="btn btn-warning btn-block">new measurement</a>
	<br>
	
	
    @include('partials.flash_notification')


@endsection