<?php namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //home page:
    public function home(){
        return view('home');
    }

    // show sign in page
    public function getLogin(){
        return view('auth.login');
    }

    // user log in
    public function postLogin(LoginRequest $request){
        if(Auth::attempt([
            'email' => $request->get('email'),
            'password' => $request->get('password')
        ], $request->get('remember'))){
            return redirect()
                ->intended('/dashboard')
                ->with('flash_notification.message', 'Logged in successfully')
                ->with('flash_notification.level', 'success');
        }

        return redirect()
            ->back()
            ->withInput()
            ->with('flash_notification.message', 'Wrong email or password')
            ->with('flash_notification.level', 'danger');
    }

    // user log out
    public function logout(){
        Auth::logout();

        return redirect('/')
            ->with('flash_notification.message', 'Logged out successfully')
            ->with('flash_notification.level', 'success');
    }

}
