@extends('layouts.master')

@section('content')
    <h1>Body Mass Index</h1> 
     <hr/>
	  <br>
	
    @include('partials.flash_notification')
	{!! Form::model($bmi, ['method' => 'put', 'route' => ['bmi.update', $bmi->id], 'class' => 'form-horizontal', 'role' => 'form']) !!}
	<!-- form : -->
	{!! Form::open(['url' => '/bmi',  'role' => 'form']) !!}


<output for="range" class="output"></output>
        <!-- height -->
        <div class="form-group{{ $errors->has('height') ? ' has-error' : '' }}">
            {!! Form::label('test', 'test', ['input type="range" name="range" id="range" min="0" max="300" step="5" value="175"' ]) !!}
            <div class="col-sm-6">
                {!! Form::label('height', null, [('<input type="range" name="range" id="range" min="0" max="300" step="5" value="175"/>')]) !!}
                <span class="help-block text-danger">
                    {{ $errors -> first('height') }}
                </span>
            </div>
        </div>
		<!-- weight -->
        <div class="form-group{{ $errors->has('weight') ? ' has-error' : '' }}">
            {!! Form::label('weight', 'weight', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6">
                {!! Form::text('weight', null, ['class' => 'form-control']) !!}
                <span class="help-block text-danger">
                    {{ $errors -> first('weight') }}
                </span>
            </div>
        </div>
		{!! Form::hidden('result', '0') !!}
        <!-- Submit Button -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-5">
                {!! Form::submit('calculate', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
    {!! Form::close() !!}
	@endsection
@section('scripts')
	<script>
	$('#range').on("change", function() {
    $('.output').val(this.value +",000  $" );
    }).trigger("change");
	</script>
@endsection
