@extends('layouts.master')

	
	@section('head')
  	<!-- head section for this page : -->
{!! Html::style('css/bootstrap-markdown.min.css') !!}
{!! Html::style('css/bootstrap-datetimepicker.min.css') !!}

@endsection
	
@section('content')
  <h1>Create New appointment</h1>
    <hr/>
    <br/>

    {!! Form::open(['url' => '/appointments', 'class' => 'form-horizontal', 'role' => 'form']) !!}

        <!-- title field -->
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            {!! Form::label('title', 'title', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6">
			            
                {!! Form::text('title', null, ['class' => 'form-control']) !!}
                <span class="help-block text-danger">
                    {{ $errors -> first('title') }}
                </span>
            </div>
        </div>
        <!-- start field -->
        <div class="form-group{{ $errors->has('start') ? ' has-error' : '' }}">
            {!! Form::label('start', 'start', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6">

                {!! Form::text('start', null, ['id'=>'datetimepicker1','class' => 'form-control']) !!}
				<span class="help-block text-danger">
                    {{ $errors -> first('start') }}
                </span>
				
            </div>
        </div>
        <!-- end field -->
        <div class="form-group{{ $errors->has('end') ? ' has-error' : '' }}">
            {!! Form::label('end', 'end', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6">
               {!! Form::text('end', null, ['id'=>'datetimepicker2','class' => 'form-control']) !!}
                <span class="help-block text-danger">
                    {{ $errors -> first('end') }}
                </span>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                {!! Form::submit('Create Appointment', ['class' => 'btn btn-warning btn-block']) !!}
            </div>
        </div>
    {!! Form::close() !!}

@endsection
@section('scripts')
<!-- scripts for this page: -->
{!! HTML::script('js/jquery-1.8.3.min.js') !!}
{!! HTML::script('js/bootstrap-markdown.min.js') !!}
{!! HTML::script('js/moment.min.js') !!}
{!! HTML::script('js/datetimepicker.js') !!}
{!! HTML::script('js/bootstrap-datetimepicker.min.js') !!}
<script>
$(document).ready(function() {
    $('#datetimepicker1').datetimepicker({
		  inline: true,
                sideBySide: true,
        pick12HourFormat: false,
		 format: 'YYYY/MM/DD h:mm:ss',
		 todayHighlight: true,
        showMeridian: true,
        autoclose: true,
    });
});

$(document).ready(function() {
    $('#datetimepicker2').datetimepicker({
		inline: true,
                sideBySide: true,
        pick12HourFormat: false,
		 format: 'YYYY/MM/DD h:mm:ss',
		 todayHighlight: true,
        showMeridian: true,
        autoclose: true,
    });
});
</script>
@endsection