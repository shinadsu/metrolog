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

        $users = User::where('role_id', 7)->with('OperatorShedules')->get();

        $startPeriod = request('startPeriod', $currentDate->toDateString());
        $daysFilter = request('daysFilter', 30);


        $events = $users->flatMap(function ($user) use ($startPeriod, $daysFilter) {
            return optional($user->OperatorShedules)
                ->where('date_start', '>=', $startPeriod)
                ->map(function ($OperatorShedulesr) use ($user) {
                    $isScheduled = in_array($OperatorShedulesr->is_working_day, [0, 1]);

                    if ($isScheduled) {
                        $scheduledIcon = $OperatorShedulesr->is_working_day === 1 ? '*' : '';
                    } else {
                        $scheduledIcon = '';
                    }

                    return [
                        'title' => $user->name,
                        'uniqIdentefy' => $OperatorShedulesr->uniqIdentefy,
                        'start' => Carbon::parse($OperatorShedulesr->date_start)->format('Y-m-d'),
                        'is_working_day' => $scheduledIcon,
                    ];
                }) ?? collect();
        });


        $events = $events->map(function ($event) {
            $event['start'] = Carbon::parse($event['start']);
            return $event;
        });

        return view('operatorshedule', [
            'events' => $events,
            'users' => $users,
            'originalDate' => $originalDate,
            'startPeriod' => $startPeriod,
            'daysFilter' => $daysFilter
        ]);
    }

    public function updateScheduleOperator(Request $request)
    {
        $operator_id = $request->input('operator_id');
        $uniqIdentefy = $request->input('uniqIdentefy');
        $date_start = $request->input('date_start');
        $is_working_day = $request->input('is_working_day');
        $comment = $request->input('comment');

        try {
            DB::beginTransaction();

            // Check if a record already exists for the given parameters
            $existingSchedule = operatorSheduler::where([
                'operator_id' => $operator_id,
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
                operatorSheduler::create([
                    'operator_id' => $operator_id,
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
                    'operator_id' => $operator_id,
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
