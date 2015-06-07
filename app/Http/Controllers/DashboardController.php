<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;



class DashboardController extends Controller{

	//show dashboard page
	public function index()
	{
		//to-do entries for this user only
		$user_id= Auth::user()->id;
        $todos = Todo::where('user_id', $user_id)->get();
		// count todo items for this user in order to display them on the dashboard gpage
		$todoCount =Todo ::count();
		// dashboard page passing the variable
		return view('dashboard.index',  compact('todoCount'));
	}
	


}