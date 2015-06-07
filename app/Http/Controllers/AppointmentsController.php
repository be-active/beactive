<?php namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\appointments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;



class appointmentsController extends Controller
{
	
	public function index()
	{	
		//assign current date time to 'now' variable: 
		$now = Carbon::now();
		//fetch all appointments for this user only
		$appointmentsList = appointments::where('user_id', Auth::user()->id)->get();
		//return appointments index page
        return view('appointments.index', compact('appointmentsList','now'));
	}

	public function show()
	{
	//fetch all appointments for this user only
	$appointments = appointments::where('user_id', Auth::user()->id)
       ->get(array('appointments.id','appointments.title','appointments.start','appointments.end'));    

    //return Response::json($event);
    $id=array();
    $title=array();
    $start=array();
    $end=array();
    $i=0;
    foreach ($appointments as $events)
        {

            $id[$i]=$events->id;
            $title[$i]=$events->title;
            $start[$i]=$events->start;
            $end[$i]=$events->end;
            $i++;           
        }
    return Response::json(array('id'=>$id,'title'=>$title,'start'=>$start,'end'=>$end));
    }
	
	//appointment create page:
    public function create()
    {
        return view('appointments.create');
    }

    //create new appointment
    public function store(Request $request)
    {
		// required fields
        $this->validate($request, ['title' => 'required']);
		$this->validate($request, ['start' => 'required']);
		$this->validate($request, ['end' => 'required']);
		//get data to be stored on the table
        appointments::create([
			'title' => $request->get('title'),
            'start' => $request->get('start'),
			'end'   => $request->get('end'),
            'user_id'  => Auth::user()->id
        ]);
		//after saving the entries redirect user to appointments index page:
        return redirect('/appointments')
            ->with('flash_notification.message', 'New appointment created successfully')
            ->with('flash_notification.level', 'success');
    }

	// update data
    public function update($id)
    {
        $appointment = appointments::findOrFail($id);
        $appointment->save();

        return redirect()
            ->route('appointments.index')
            ->with('flash_notification.message', 'appointment updated successfully')
            ->with('flash_notification.level', 'success');
    }

    // Delete appointment
    public function destroy($id)
    {
        $appointment = appointments::findOrFail($id);
        $appointment->delete();

        return redirect()
            ->route('appointments.index')
            ->with('flash_notification.message', 'appointment deleted successfully')
            ->with('flash_notification.level', 'success');
    }
}
