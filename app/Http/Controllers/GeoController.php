<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\geo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


class geoController extends Controller
{
    /**
     * View ToDos listing
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('geo.index');
    }


   
	// Create new walking entry:
    public function store(Request $request)
    {
        

        geo::create([
		    'start'      => $request->get('start'),
			'stop'      => $request->get('stop'),
			'distance'      => $request->get('distance'),
            'note'      => '',
            'user_id'   => Auth::user()->id
        ]);

        return redirect('/geo')
            ->with('flash_notification.message', 'New walking entry created successfully')
            ->with('flash_notification.level', 'success');
    }

    // delete geo entry
    public function destroy($id)
    {
        $geo = geo::findOrFail($id);
        $geo->delete();

        return redirect()
            ->route('todo.index')
            ->with('flash_notification.message', 'Enty deleted successfully')
            ->with('flash_notification.level', 'success');
    }
}
