<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use App\Models\logisticsShedule;
use Illuminate\Support\Facades\DB;
use App\Models\ResonsForNotJob;
use Illuminate\Support\Facades\Validator;


class LogisticSheduleController extends Controller
{

    public function index()
    {
        $currentDate = Carbon::now();
        $originalDate = clone $currentDate;
        $nojob = ResonsForNotJob::all();
        $nojobReasons = ['Больничный', 'Дежурство', 'Невыход Без объяснения', 'Отпуск', 'По семейным обст-вам', 'Поломка машины', 'Снят с маршрута'];

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
                        'logist_id' => $logisticsSheduler->logist_id,
                        'title' => $user->name,
                        'uniqIdentefy' => $logisticsSheduler->uniqIdentefy,
                        'start' => Carbon::parse($logisticsSheduler->start_date)->format('Y-m-d'),
                        'end' => Carbon::parse($logisticsSheduler->end_date)->format('Y-m-d'),
                        'is_scheduled' => $scheduledIcon,
                        'reasonForNot' => $logisticsSheduler->reasonForNot,
                    ];
                }) ?? collect();
        });

        $eventsForTotals = $events->filter(function ($event) {
            return empty($event['reasonForNot']);
        });

        // Преобразовать 'start' в объект Carbon
        $eventsForTotals = $eventsForTotals->map(function ($event) {
            $event['start'] = Carbon::parse($event['start']);
            return $event;
        });


        $totalShifts = $eventsForTotals->where('is_scheduled', '*')->count();



        return view('logisticshedule', [
            'events' => $events,
            'users' => $users,
            'originalDate' => $originalDate,
            'startPeriod' => $startPeriod,
            'daysFilter' => $daysFilter,
            'notjob' => $nojob,
            'nojobReasons' => $nojobReasons,
            'totalShifts' => $totalShifts,
            'eventsForTotals' => $eventsForTotals
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


    public function storeLogistShedule(Request $request)
    {
        // Валидация данных
        $validator = Validator::make($request->all(), [
            'logist' => 'required',
            'reasonForNot' => 'required',
            'commentary' => 'required',
            'date_interval' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $logist_id = $request->input('logist');
        $reasonForNot = $request->input('reasonForNot');
        $commentary = $request->input('commentary');
        $date_interval = $request->input('date_interval');
        $uniqIdentefy = $request->input('uniqIdentefy');
        $is_scheduled = $request->input('is_scheduled');

        try {
            DB::beginTransaction();

            // Разбиваем диапазон дат
            [$start_date, $end_date] = explode(' - ', $date_interval);

            // // Используем Carbon для форматирования даты
            // $start_date = Carbon::createFromFormat('d.m.Y', $start_date)->toDateString();
            // $end_date = Carbon::createFromFormat('d.m.Y', $end_date)->toDateString();

            // Создаем новую запись в таблице logistics_shedules
            logisticsShedule::create([
                'logist_id' => $logist_id,
                'reasonForNot' => $reasonForNot,
                'commentary' => $commentary,
                'start_date' => $start_date,
                'end_date' => $end_date,
                'uniqIdentefy' => $uniqIdentefy,
                'is_scheduled' => $is_scheduled
            ]);

            DB::commit();

            // Редирект после успешного сохранения
            return response()->json([
                'success' => true,
                'data' =>
                    [
                        'logist_id' => $logist_id,
                        'uniqIdentefy' => $uniqIdentefy,
                        'start_date' => $start_date,
                        'end_date' => $end_date,
                        'reasonForNot' => $reasonForNot,
                        'is_scheduled' => $is_scheduled
                    ],
            ]);
        } catch (\Exception $e) {
            dd($e);
            DB::rollBack();

           
        }
    }


}
