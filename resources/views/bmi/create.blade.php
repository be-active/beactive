@extends('layouts.master')

@section('content')
    <h1>Body Mass Index</h1> 
     <hr/>
	  <br>
	
    @include('partials.flash_notification')
	
	<!-- form : -->
	{!! Form::open(['url' => '/bmi', 'class' => 'form-horizontal', 'role' => 'form']) !!}
        <!-- height -->
        <div class="form-group{{ $errors->has('height') ? ' has-error' : '' }}">
            {!! Form::label('height', 'height', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6">
                {!! Form::text('height', null, ['placeholder' => 'your height in meters, eg 1.70','class' => 'form-control']) !!}
                <span class="help-block text-danger">
                    {{ $errors -> first('height') }}
                </span>
            </div>
        </div>
		<!-- weight -->
        <div class="form-group{{ $errors->has('weight') ? ' has-error' : '' }}">
            {!! Form::label('weight', 'weight', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6">
                {!! Form::text('weight', null, ['placeholder' => 'your weight in kilos, eg 80','class' => 'form-control']) !!}
                <span class="help-block text-danger">
                    {{ $errors -> first('weight') }}
                </span>
            </div>
        </div>
		{!! Form::hidden('result', '0') !!}
        <!-- Submit Button -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-5">
                {!! Form::submit('calculate', ['class' => 'btn btn-warning btn-md']) !!}
            </div>
        </div>
    {!! Form::close() !!}
    
@endsection