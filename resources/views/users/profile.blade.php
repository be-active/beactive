@extends('layouts.master')

@section('content')
    <h1>User Profile</h1>
    <hr/>

    {!! Form::model($user, ['method' => 'put', 'route' => ['user.update', $user->id], 'class' => 'form-horizontal', 'role' => 'form']) !!}
        @include('users._form')

        <!-- submit button -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                {!! Form::submit('Update my profile', ['style'=>'width: 100%;','class' => 'btn btn-warning btn-md']) !!}
				</div>
				  <div class="col-sm-offset-3 col-sm-6">
				  <br>
                <a href="{{ url('/todo') }}" style="width: 100%;" class="btn btn-danger">Cancel</a>
            </div>
        </div>
    {!! Form::close() !!}
@endsection