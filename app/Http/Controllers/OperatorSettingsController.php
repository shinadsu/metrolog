<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\operatorSheduler;
use App\Models\User;
use Illuminate\Support\Facades\Validator;


class OperatorSettingsController extends Controller
{
    public function index()
    {   
        $OperatorShedules = User::where('role_id', 7)->with('OperatorShedules.user')->get();
        
        return view('operator', compact('OperatorShedules'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'operator_id' => 'required|integer',
            'date_start' => 'required|date',
            'is_working_day' => 'nullable',
            'incoming' => 'nullable',
            'outgoing' => 'nullable',
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
            operatorSheduler::create([
                'operator_id' => $request->operator_id,
                'date_start' => $request->date_start,
                'is_working_day' => $request->is_working_day,
                'incoming' => $request->incoming,
                'outgoing' => $request->outgoing,
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
