<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\logisticsShedule;
use App\Models\User;
use Carbon\Carbon;

class LogisticSheduleController extends Controller
{
 
    public function index()
    {   

        $currentDate = Carbon::now();
        $originalDate = clone $currentDate;
        $users = User::where('role_id', 5)->get();
        $events = logisticsShedule::with('user')->get();

        $events = $events->map(function ($logisticsSheduler) {
            $isScheduled = $logisticsSheduler->is_scheduled === 1;
            $scheduledIcon = $isScheduled ? '*' : '';
        
            return [
                'title' => $logisticsSheduler->user->name,
                'start' => Carbon::parse($logisticsSheduler->start_date)->format('Y-m-d'),
                'end' => Carbon::parse($logisticsSheduler->end_date)->format('Y-m-d'),
                'is_scheduled' => $scheduledIcon,
            ];
        });
        
        // Преобразовать 'start' в объект Carbon
        $events = $events->map(function ($event) {
            $event['start'] = Carbon::parse($event['start']);
            return $event;
        });
        

        return view('logisticshedule', ['events' => $events, 'users' => $users, 'originalDate' => $originalDate]);
    }

    
 
}
