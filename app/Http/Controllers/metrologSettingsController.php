<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MetrologSheduler;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class metrologSettingsController extends Controller
{
    public function index()
    {   
        $metrologShedules = User::where('role_id', 2)->with('MetrologSheduler.user')->get();
        
        return view('metrologSettingSheduler', compact('metrologShedules'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'metrolog_id' => 'required|integer',
            'shedule_date_start' => 'required|date_format:Y-m-d\TH:i',
            'shedule_date_end' => 'required|date_format:Y-m-d\TH:i',
            'is_working_day' => 'nullable',
            'day_off' => 'nullable',
            'sick_leave' => 'nullable',
            'other_leave' => 'nullable',
            'comment' => 'nullable',
            
           
        ]);

        if ($validator->fails()) 
        {   
            dd($validator->errors());
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try 
        {
            // Создайте новую запись в базе данных
            MetrologSheduler::create([
                'metrolog_id' => $request->metrolog_id,
                'shedule_date_start' => $request->shedule_date_start,
                'shedule_date_end' => $request->shedule_date_end,
                'is_working_day' => $request->is_working_day,
                'day_off' => $request->day_off,
                'sick_leave' => $request->sick_leave,
                'other_leave' => $request->other_leave,
                'comment' => $request->comment,
               
                
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
