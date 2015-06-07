<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\bmi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


class bmiController extends Controller
{
   
    // show BMI main page
	public function index()
    {

        $bmis = bmi::where('user_id', Auth::user()->id)->get();
        return view('bmi.index', compact('bmis'));
    }

    // create new BMI page
    public function create()
    {
        return view('bmi.create');
    }

	// store BMI to the database
	public function store(Request $request)
    {
        $this->validate($request, ['weight' => 'required']);
		$this->validate($request, ['height' => 'required']);
		$weight=$request->get('weight');
		$height= $request->get('height');
		$result=$request->get('result');
		$multiplication=$height*$height;
		$finalresult=$weight/$multiplication;
        bmi::create([
            'weight'    => $weight,
			'height'    => $height,
			'result'    => $finalresult,
            'user_id'   => Auth::user()->id
        ]);

        return redirect('/bmi')
            ->with('flash_notification.message', 'your BMI has been calculated')
            ->with('flash_notification.level', 'success');
    }

	
	// show bmi page
    public function show(bmi $bmi)
    {
        return view('bmi.show', compact('bmi'));
    }
	
	// delete BMI input
    public function destroy($id)
    {
        $bmi = bmi::findOrFail($id);
        $bmi->delete();

        return redirect()
            ->route('bmi.index')
            ->with('flash_notification.message', 'your BMI record deleted successfully')
            ->with('flash_notification.level', 'success');
    }


}
