<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\logisticsShedule;

class LogisticSheduleController extends Controller
{
 
        public function index()
        {  
            $events = logisticsShedule::with('user')->get();
        
            $events = $events->map(function($logisticsSheduler) {
                return [
                    'title' => $logisticsSheduler->user->name,
                    'start' => $logisticsSheduler->start_date,
                    'end' => $logisticsSheduler->end_date,
                    'is_scheduled' => $logisticsSheduler->is_scheduled,
                ];
            });
            // return $events
            return view('logisticshedule', ['events' => $events]);
        }
 
}
