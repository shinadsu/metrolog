<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use App\Models\logisticsShedule;
use Illuminate\Support\Facades\DB;

class LogisticSheduleController extends Controller
{

    public function index()
    {
        $currentDate = Carbon::now();
        $originalDate = clone $currentDate;

        // Используем отношение для загрузки связанных данных
        $users = User::where('role_id', 5)->with('logisticShedules')->get();

        $startPeriod = request('startPeriod', $currentDate->toDateString());
        $daysFilter = request('daysFilter', 30);

        // Заменяем запрос с использованием отношения
        $events = $users->flatMap(function ($user) use ($startPeriod, $daysFilter) {
            return optional($user->logisticShedules)
                ->where('start_date', '>=', $startPeriod)
                ->map(function ($logisticsSheduler) use ($user) {
                    $isScheduled = in_array($logisticsSheduler->is_scheduled, [0, 1]);
        
                    if ($isScheduled) {
                        $scheduledIcon = $logisticsSheduler->is_scheduled === 1 ? '*' : '';
                    } else {
                        $scheduledIcon = ''; 
                    }
        
                    return [
                        'title' => $user->name,
                        'uniqIdentefy' => $logisticsSheduler->uniqIdentefy,
                        'start' => Carbon::parse($logisticsSheduler->start_date)->format('Y-m-d'),
                        'is_scheduled' => $scheduledIcon,
                    ];
                }) ?? collect();
        });
        

        // Преобразовать 'start' в объект Carbon
        $events = $events->map(function ($event) {
            $event['start'] = Carbon::parse($event['start']);
            return $event;
        });



        return view('logisticshedule', [
            'events' => $events,
            'users' => $users,
            'originalDate' => $originalDate,
            'startPeriod' => $startPeriod,
            'daysFilter' => $daysFilter,
        ]);
    }

    // ОБНОВЛЕНИЕ ДАННЫХ В БАЗЕ
    public function updateSchedule(Request $request)
    {
        $logist_id = $request->input('logist_id');
        $uniqIdentefy = $request->input('uniqIdentefy');
        $start_date = $request->input('start_date');
        $is_scheduled = $request->input('is_scheduled');
        $reasonForNot = $request->input('reasonForNot');

        try {
            DB::beginTransaction();

            // Check if a record already exists for the given parameters
            $existingSchedule = logisticsShedule::where([
                'logist_id' => $logist_id,
                'uniqIdentefy' => $uniqIdentefy,
                'start_date' => $start_date,
            ])->first();

            if ($existingSchedule) {
                // If a record exists, update it
                $existingSchedule->update([
                    'is_scheduled' => $is_scheduled,
                    'reasonForNot' => $reasonForNot,
                ]);
            } else {
                // If no record exists, create a new one
                logisticsShedule::create([
                    'logist_id' => $logist_id,
                    'uniqIdentefy' => $uniqIdentefy,
                    'start_date' => $start_date,
                    'is_scheduled' => $is_scheduled,
                    'reasonForNot' => $reasonForNot,
                ]);
            }

            DB::commit();

            // Return the response (customize as needed)
            return response()->json([
                'success' => true,
                'data' =>
                [
                    'logist_id' => $logist_id,
                    'uniqIdentefy' => $uniqIdentefy,
                    'start_date' => $start_date,
                    'is_scheduled' => $is_scheduled,
                    'reasonForNot' => $reasonForNot,
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
