<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\User;
use App\Models\Statuses;
use App\Models\Organization;
use App\Models\RouteSheet;
class itinerary extends Controller
{
    public function index()
    {
        // Получение данных из таблицы route_sheets с пагинацией
        $users = $this->getUsersWithRoleIdTwo();
        $status = $this->getStatuses();
        $routeSheets = RouteSheet::paginate(10); // Укажите необходимое количество записей на странице

        // Передача данных в представление
        return view('itinerary', [
            'routeSheets' => $routeSheets,
            'users' => $users,
            'status' => $status
        ]);
    }


    public function getUsersWithRoleIdTwo()
    {
        return User::where('role_id', 2)->get();
    }

    
    public function getStatuses()
    {
        return Statuses::all();
    }

    public function search(Request $request)
    {   
        
        $routeSheets = RouteSheet::where('route_sheet_number', 'like', '%' . $request->input('routeSheetNumber') . '%')->paginate(10);
        $users = $this->getUsersWithRoleIdTwo();
        $status = $this->getStatuses();

        return view('itinerary', [
            'routeSheets' => $routeSheets,
            'users' => $users,
            'status' => $status
        ]);
    }
}
