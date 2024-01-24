<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class itinerary extends Controller
{
    public function index()
    {   
        return view('itinerary');
    }
}
