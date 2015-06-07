@extends('layouts.master')

@section('content')
    <h1>Todo List</h1> 
    <hr/>
	
	
		<a href="{{ url('/todo/create') }}" class="btn btn-warning btn-block">Add New Todo</a>
	<br>
	
	
    @include('partials.flash_notification')

    @if(count($todoList))
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>ToDo Title</th>
                    <th>Status</th>
                    <th>Update Status</th>
					<th>Delete</th>
                </tr>
                </thead>

                <tbody>
                @foreach($todoList as $todo)
                    <tr>
					@if($todo->complete)
                        <td><del>{{ $todo->name }}<del></td>
					@else
						<td>{{ $todo->name }}</td>
                    @endif
                        <td>{{ $todo->complete? 'Completed' : 'Pending' }}</td>
                        <td>
                            {!! Form::open(['route' => ['todo.update', $todo->id], 'class' => 'form-inline', 'method' => 'put']) !!}
                                @if($todo->complete)
                                    {!! Form::submit('change status to > Incomplete', ['class' => 'btn btn-info btn-xs']) !!}
                                @else
                                    {!! Form::submit('change status to > Complete   ', ['class' => 'btn btn-success btn-xs']) !!}
                                @endif
                            {!! Form::close() !!}
							</td>
							<td>
                            {!! Form::open(['route' => ['todo.destroy', $todo->id], 'class' => 'form-inline', 'method' => 'delete']) !!}
                                {!! Form::hidden('id', $todo->id) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="text-center">
            {!! $todoList->render() !!}
        </div>
    @else
        <div class="text-center">
            <h3>No todos available yet</h3>
            <p><a href="{{ url('/todo/create') }}">Create new todo</a></p>
        </div>
    @endif
	
@endsection