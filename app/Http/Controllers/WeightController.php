<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\weight;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


class WeightController extends Controller
{
	//function that redirects user at weight list page
    public function index()
    {
	    $weightList = weight::where('user_id', Auth::user()->id)->paginate(10);
        return view('weight.list', compact('weightList'));	
    }
	

	//function that redirects user at weight list page
	public function show()
	{
	
		$weightList = weight::where('user_id', Auth::user()->id)
		->get(array('weight.id','weight.weight','weight.created_at'));    
    
		//assign field values into variables :
		$id=array();
		$weight=array();
		$created_at=array();
		$i=0;
		foreach ($weightList as $weight)
        {

            $id[$i]=$weight->id;
            $weight[$i]=$weight->weight;
            $created_at[$i]=$weight->created_at;
            $i++;           
        }
	//return Response::json($weight);
    return Response::json(array('id'=>$id,'weight'=>$weight,'created_at'=>$created_at));    
	}	


    // update an entry
    public function update($id)
    {
        $weight = weight::findOrFail($id);
        $weight->save();

        return redirect()
            ->route('weight.index')
            ->with('flash_notification.message', 'weight updated successfully')
            ->with('flash_notification.level', 'success');
    }
	
	
	// create new entry
    public function create()
    {
        return view('weight.create');
    }
	
	    public function store(Request $request)
    {
        $this->validate($request, ['weight' => 'required']);

        weight::create([
            'weight'      => $request->get('weight'),
            'user_id'   => Auth::user()->id
        ]);

        return redirect()
		 ->route('weight.index')
            ->with('flash_notification.message', 'New weight added successfully')
            ->with('flash_notification.level', 'success');
    }

   // delete weight input
    public function destroy($id)
    {
        $weight = weight::findOrFail($id);
        $weight->delete();

        return redirect()
            ->route('weight.index')
            ->with('flash_notification.message', 'Weight record deleted successfully')
            ->with('flash_notification.level', 'success');
    }


}
