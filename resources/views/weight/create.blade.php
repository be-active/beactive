@extends('layouts.master')

@section('content')
    <h1>Add new weight measurement</h1>
    <hr/>

    {!! Form::open(['url' => '/weight', 'class' => 'form-horizontal', 'role' => 'form']) !!}
        <!-- weight Field -->
        <div class="form-group{{ $errors->has('weight') ? ' has-error' : '' }}">
            {!! Form::label('weight', 'weight', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6">
                {!! Form::text('weight', null, ['placeholder' => 'your weight in kg','class' => 'form-control']) !!}
                <span class="help-block text-danger">
                    {{ $errors -> first('weight') }}
                </span>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                {!! Form::submit('add this record', ['style'=>'width: 100%;','class' => 'btn btn-warning btn-md']) !!}
            </div>
        </div>
    {!! Form::close() !!}
@endsection