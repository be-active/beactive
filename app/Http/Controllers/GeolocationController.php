<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\geo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


class GeolocationController extends Controller
{
    //function that redirects user at geolocation page
    public function index()
    {
        return view('geo.index');
    }


	//store data to the table
    public function store(Request $request)
    {
        $this->validate($request, ['note' => 'required']);

        geo::create([
            'note'      => $request->get('note'),
            'user_id'   => Auth::user()->id
        ]);

        return redirect('/geo')
            ->with('flash_notification.message', 'New entry created successfully')
            ->with('flash_notification.level', 'success');
    }
	
	// delete geo entry
    public function destroy($id)
    {
        $todo = geo::findOrFail($id);
        $todo->delete();

        return redirect()
            ->route('geo.index')
            ->with('flash_notification.message', 'entry deleted successfully')
            ->with('flash_notification.level', 'success');
    }
}
