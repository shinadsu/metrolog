<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MetrologSheduler;
use App\Models\User;
use Carbon\Carbon;

class metrologShowShedule extends Controller
{
    public function index()
    {   

        $currentDate = Carbon::now();
        $originalDate = clone $currentDate;
        $users = User::where('role_id', 2)->get();
        $startPeriod = request('startPeriod', $currentDate->toDateString());
        $daysFilter = request('daysFilter', 30); 

        $events = MetrologSheduler::with('user')
        ->where('shedule_date_start', '>=', $startPeriod) // Примените фильтр начиная с указанной даты
        ->get();

        $events = $events->map(function ($metrologSheduler) {
            $isScheduled = $metrologSheduler->is_working_day === 1;
            $scheduledIcon = $isScheduled ? '*' : '';
        
            return [
                'title' => $metrologSheduler->user->name,
                'start' => Carbon::parse($metrologSheduler->shedule_date_start)->format('Y-m-d'),
                'end' => Carbon::parse($metrologSheduler->shedule_date_end)->format('Y-m-d'),
                'is_scheduled' => $scheduledIcon,
            ];
        });
        
        // Преобразовать 'start' в объект Carbon
        $events = $events->map(function ($event) {
            $event['start'] = Carbon::parse($event['start']);
            return $event;
        });
        

        return view('metrologSheduler', ['events' => $events, 'users' => $users, 'originalDate' => $originalDate, 'startPeriod' => $startPeriod, 'daysFilter' => $daysFilter]);
    }
}
