@extends('layouts.master')

@section('content')
	<!-- page title -->
    <h1>Sign Up</h1>
    <hr/>

    {!! Form::open(['url' => '/user', 'class' => 'form-horizontal', 'role' => 'form']) !!}
        @include('users._form')

        <!-- submit button -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                {!! Form::submit('Sign me Up', ['style'=>'width: 100%;','class' => 'btn btn-warning btn-md']) !!}
            </div>
        </div>
    {!! Form::close() !!}
@endsection