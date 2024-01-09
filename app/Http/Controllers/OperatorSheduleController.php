<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\operatorSheduler;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class OperatorSheduleController extends Controller
{
    public function index()
    {  
        $currentDate = Carbon::now();
        $originalDate = clone $currentDate;
        $users = User::where('role_id', 7)->get();
        $events = OperatorSheduler::with('user')->get();
    
        $events = $events->flatMap(function ($operatorsheduler) {
            $isWorkingDay = $operatorsheduler->is_working_day === 1;
            $workingDayIcon = $isWorkingDay ? '*' : '';
            
                return [
                    [
                        'title' => $operatorsheduler->user->name,
                        'start' => Carbon::parse($operatorsheduler->date_start)->format('Y-m-d'),   
                        'end' => Carbon::parse($operatorsheduler->date_end)->format('Y-m-d'),
                        'incoming' => $operatorsheduler->incoming,
                        'outgoing' => $operatorsheduler->outgoing,
                        'working_day_icon' => $workingDayIcon,
                    ],
                ];
            
        });

        $events = $events->map(function ($event) {
            $event['start'] = Carbon::parse($event['start']);
            return $event;
        });
        
    
        return view('operatorshedule', ['events' => $events, 'users' => $users, 'originalDate' => $originalDate]);
    }
    
    

       
}
    