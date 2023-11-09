<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\statustransitions;
use App\Models\Statuses;  
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class statustransitionsController extends Controller
{
    public function index()
    {   
        $roles = DB::table('roles')->get();
        $statuses = DB::table('statuses')->get();
        
        $statustransitions = DB::table('statustransitions')
            ->select(
                'statuses_base.name as base_status_name',
                'statuses_new.name as new_status_name',
                'roles.name as role_name',
                'statustransitions.own_requests_allowed',
                'statustransitions.others_requests_allowed'
            )
            ->join('roles', 'statustransitions.role_id', '=', 'roles.id')
            ->join('statuses as statuses_base', 'statustransitions.base_status_id', '=', 'statuses_base.id')
            ->join('statuses as statuses_new', 'statustransitions.new_status_id', '=', 'statuses_new.id')
            ->get();
        
        return view('statustransitions', compact('roles', 'statuses', 'statustransitions'));
    }



    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), 
        [
            'base_status_id' => 'required|integer',
            'new_status_id' => 'required|integer',
            'role_id' => 'required|integer',
            'own_requests_allowed' => 'required|integer',
            'others_requests_allowed' => 'required|integer',
        ]);

        if ($validator->fails()) 
        {   
            dd($validator->errors());
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try 
        {
            // Создайте новую запись в базе данных
            statustransitions::create([
                'base_status_id' => $request->base_status_id,
                'new_status_id' => $request->new_status_id,
                'role_id' => $request->role_id,
                'own_requests_allowed' => $request->own_requests_allowed,
                'others_requests_allowed' => $request->others_requests_allowed,
                
            ]);

            // Успешное создание записи, выполните дополнительные действия, если необходимо

            return redirect()->back()->with('success', 'Данные успешно сохранены.');
        } 
        catch (\Exception $e) 
        {
            dd($e);
            return redirect()->back()->with('error', 'Произошла ошибка. Пожалуйста, попробуйте еще раз.');
        }

    }
}
