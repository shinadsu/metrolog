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
        // Fetch data from the route_sheets table
        $users = $this->getUsersWithRoleIdTwo();
        $status = $this->getStatuses();
        $routeSheets = RouteSheet::all();

        // Pass the data to the view
        return view('itinerary', 
        [
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
}
