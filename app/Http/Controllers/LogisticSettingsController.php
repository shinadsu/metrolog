<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\logisticsShedule;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

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
            'date' => 'required|date',
            'start_date' => 'required|date_format:Y-m-d\TH:i',
            'end_date' => 'required|date_format:Y-m-d\TH:i',
            'is_scheduled' => 'required|integer',
            'reasonForNot' => 'nullable',
        ]);

        if ($validator->fails()) 
        {   
            dd($validator->errors());
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try 
        {
            // Создайте новую запись в базе данных
            logisticsShedule::create([
                'logist_id' => $request->logist_id,
                'date' => $request->date,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'is_scheduled' => $request->is_scheduled,
                'reasonForNot' => $request->reasonForNot,
                
            ]);
            return redirect()->back()->with('success', 'Данные успешно сохранены.');
        } 
        catch (\Exception $e) 
        {
            dd($e);
            return redirect()->back()->with('error', 'Произошла ошибка. Пожалуйста, попробуйте еще раз.');
        }
    }
}
