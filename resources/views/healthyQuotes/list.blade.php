@extends('layouts.master')

@section('content')
    <h1>Healthy Quotes</h1>
    <hr/>
	<br>
		
    @include('partials.flash_notification')
              <!-- display a list of all healthy quotes-->
                @foreach($HealthyQuotesList as $HealthyQuote)
					<div class="text-warning">{{$HealthyQuote->title}}</div>
						<blockquote><p>{{$HealthyQuote->body}}</p>
						<p><small>{{$HealthyQuote->author}}</small></p></blockquote><br>
                @endforeach

       


@endsection