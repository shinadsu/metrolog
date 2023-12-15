<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\operatorSheduler;

class OperatorSheduleController extends Controller
{
    public function index()
    {  
        $events = OperatorSheduler::with('user')->get();
    
        $events = $events->map(function($operatorsheduler) {
            return [
                'title' => $operatorsheduler->user->name,
                'start' => $operatorsheduler->date_start,
                'end' => $operatorsheduler->date_end,
                'incoming' => $operatorsheduler->incoming,
                'outgoing' => $operatorsheduler->outgoing,
            ];
        });

        // return $events
    
        return view('operatorshedule', ['events' => $events]);
    }
    
}
