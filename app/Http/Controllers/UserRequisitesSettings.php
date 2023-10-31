<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\CreateUserRequisitesSettingsTable;
use App\Models\Statuses;  
use App\Models\Role;
use App\Models\Prop;

// Подключите вашу модель

class UserRequisitesSettings extends Controller
{
    public function index()
    {   
        $roles = Role::all();
        $status = Statuses::all();
        $propses = Prop::all();
        $requisitesSettings = CreateUserRequisitesSettingsTable::with('role', 'prop', 'status')->get();
        return view('UserRequisitsSettings', compact('roles', 'propses', 'status', 'requisitesSettings'));
       
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), 
        [
            'role_id' => 'required|integer',
            'propses_id' => 'required|integer',
            'status_id' => 'required|integer',
            'access_type' => 'required|string',
            'own_requests_allowed' => 'required|integer',
            'others_requests_allowed' => 'required|integer',
            'setting_enabled' => 'required|boolean',
        ]);

        if ($validator->fails()) 
        {   
            dd($validator->errors());
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try 
        {
            // Создайте новую запись в базе данных
            CreateUserRequisitesSettingsTable::create([
                'role_id' => $request->role_id,
                'propses_id' => $request->propses_id,
                'status_id' => $request->status_id,
                'access_type' => $request->access_type,
                'own_requests_allowed' => $request->own_requests_allowed,
                'others_requests_allowed' => $request->others_requests_allowed,
                'setting_enabled' => $request->setting_enabled,
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

