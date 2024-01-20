<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\logisticsShedule;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class LogisticSettingsController extends Controller
{
    public function index()
    {
        $logisticSettings = User::where('role_id', 5)->with('logisticShedules.user')->get();

        return view('logistic', compact('logisticSettings'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'logist_id' => 'required|integer',
            'uniqIdentefy' => 'nullable',
            'start_date' => 'required|date',
            'is_scheduled' => 'required|integer',
            'reasonForNot' => 'nullable',
        ]);

        if ($validator->fails()) {
            dd($validator->errors());
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {

            $uniqIdentefy = Str::random(50);
            // Создайте новую запись в базе данных
            logisticsShedule::create([
                'logist_id' => $request->logist_id,
                'uniqIdentefy' => $uniqIdentefy,
                'start_date' => $request->start_date,
                'is_scheduled' => $request->is_scheduled,
                'reasonForNot' => $request->reasonForNot,

            ]);
            return redirect()->back()->with('success', 'Данные успешно сохранены.');
        } catch (\Exception $e) {
            dd($e);
            return redirect()->back()->with('error', 'Произошла ошибка. Пожалуйста, попробуйте еще раз.');
        }
    }
}


