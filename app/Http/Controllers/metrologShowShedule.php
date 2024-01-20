<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MetrologSheduler;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class metrologShowShedule extends Controller
{
    public function index()
    {   

        $currentDate = Carbon::now();
        $originalDate = clone $currentDate;

        $users = User::where('role_id', 2)->with('MetrologShedules')->get();

        $startPeriod = request('startPeriod', $currentDate->toDateString());
        $daysFilter = request('daysFilter', 30); 


        $events = $users->flatMap(function ($user) use ($startPeriod, $daysFilter) {
            return optional($user->MetrologShedules)
                ->where('date_start', '>=', $startPeriod)
                ->map(function ($MetrologShedulesr) use ($user) {
                    $isScheduled = in_array($MetrologShedulesr->is_working_day, [0, 1]);

                    if ($isScheduled) {
                        $scheduledIcon = $MetrologShedulesr->is_working_day === 1 ? '*' : '';
                    } else {
                        $scheduledIcon = '';
                    }

                    return [
                        'title' => $user->name,
                        'uniqIdentefy' => $MetrologShedulesr->uniqIdentefy,
                        'start' => Carbon::parse($MetrologShedulesr->date_start)->format('Y-m-d'),
                        'is_working_day' => $scheduledIcon,
                    ];
                }) ?? collect();
        });
        
        // Преобразовать 'start' в объект Carbon
        $events = $events->map(function ($event) {
            $event['start'] = Carbon::parse($event['start']);
            return $event;
        });
        

        return view('metrologSheduler', ['events' => $events, 'users' => $users, 'originalDate' => $originalDate, 'startPeriod' => $startPeriod, 'daysFilter' => $daysFilter]);
    }

    public function updateScheduleMetrolog(Request $request)
    {
        $metrolog_id = $request->input('metrolog_id');
        $uniqIdentefy = $request->input('uniqIdentefy');
        $date_start = $request->input('date_start');
        $is_working_day = $request->input('is_working_day');
        $comment = $request->input('comment');

        try {
            DB::beginTransaction();

            // Check if a record already exists for the given parameters
            $existingSchedule = MetrologSheduler::where([
                'metrolog_id' => $metrolog_id,
                'uniqIdentefy' => $uniqIdentefy,
                'date_start' => $date_start,
            ])->first();

            if ($existingSchedule) {
                // If a record exists, update it
                $existingSchedule->update([
                    'is_working_day' => $is_working_day,
                    'comment' => $comment,
                ]);
            } else {
                // If no record exists, create a new one
                MetrologSheduler::create([
                    'metrolog_id' => $metrolog_id,
                    'uniqIdentefy' => $uniqIdentefy,
                    'date_start' => $date_start,
                    'is_working_day' => $is_working_day,
                    'comment' => $comment,
                ]);
            }

            DB::commit();

            // Return the response (customize as needed)
            return response()->json([
                'success' => true,
                'data' =>
                [
                    'metrolog_id' => $metrolog_id,
                    'uniqIdentefy' => $uniqIdentefy,
                    'date_start' => $date_start,
                    'is_working_day' => $is_working_day,
                    'comment' => $comment,
                ],
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            // Handle the error (customize as needed)
            return response()->json([
                'success' => false,
                'error' => $e->getMessage(),
                'input_data' => $request->all(),
            ]);
        }
    }
}
