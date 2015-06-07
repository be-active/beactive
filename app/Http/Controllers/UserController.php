<?php namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Constructor method
    public function __construct()
	{
		// authorization
        $this->middleware('auth', ['only' => ['edit', 'update']]);
    }

	// show sign up form
    public function create()
    {
        return view('users.create');
    }

    // save data coming from the form
    public function store(UserRequest $request)
    {
        User::create([
            'name'      => $request->get('name'),
            'email'     => $request->get('email'),
            'password'  => bcrypt($request->get('password'))
        ]);

        return redirect('login')
            ->with('flash_notification.message', 'User registered successfully')
            ->with('flash_notification.level', 'success');
    }

    // show user profile page
    public function edit(User $user)
    {
        return view('users.profile', compact('user'));
    }

    // update user profile
    public function update(User $user, Request $request)
    {
        $this->validate($request, [
            'name'      => 'required',
            'email'     => 'required|email',
            'password'  => 'confirmed'
        ]);

        $user->name     = $request->get('name');
        $user->email    = $request->get('email');
        if($request->get('password') !== ''){
            $user->password = $request->get('password');
        }
        $user->save();

        return redirect('/')
            ->with('flash_notification.message', 'your profile has been updated successfully')
            ->with('flash_notification.level', 'success');
    }

}
