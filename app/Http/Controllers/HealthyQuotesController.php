<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\HealthyQuotes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


class HealthyQuotesController extends Controller
{
    // show healthy quotes page:
    public function index()
    {
        $HealthyQuotesList = HealthyQuotes::all();
        return view('HealthyQuotes.list', compact('HealthyQuotesList'));
    }

 
}
