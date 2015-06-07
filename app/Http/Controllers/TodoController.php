<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


class TodoController extends Controller
{
    // show to-do index page
    public function index()
    {
        $todoList = Todo::where('user_id', Auth::user()->id)->paginate(7);
        return view('todo.list', compact('todoList'));
    }

    // show : create new to-do page
    public function create()
    {
        return view('todo.create');
    }

    // save data from the form
    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required']);

        Todo::create([
            'name'      => $request->get('name'),
            'user_id'   => Auth::user()->id
        ]);

        return redirect('/todo')
            ->with('flash_notification.message', 'New todo created successfully')
            ->with('flash_notification.level', 'success');
    }

    // update 'status' field
    public function update($id)
    {
        $todo = Todo::findOrFail($id);
        $todo->complete = ! $todo->complete;
        $todo->save();

        return redirect()
            ->route('todo.index')
            ->with('flash_notification.message', 'Todo updated successfully')
            ->with('flash_notification.level', 'success');
    }

    // delete to do entry
    public function destroy($id)
    {
        $todo = Todo::findOrFail($id);
        $todo->delete();

        return redirect()
            ->route('todo.index')
            ->with('flash_notification.message', 'Todo deleted successfully')
            ->with('flash_notification.level', 'success');
    }
}
