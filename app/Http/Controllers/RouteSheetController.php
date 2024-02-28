<?php

// app/Http/Controllers/RouteSheetController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RouteSheet;
use App\Models\Application;
use App\Models\User;
use App\Models\Statuses;
use App\Models\Organization;

class RouteSheetController extends Controller
{
    public function createRouteSheet(Request $request)
    {
        $routeSheetData = $request->input('routeSheetData');
        $authorName = auth()->user()->name;
        $organizationName = $request->input('organizationName');
        $timeInput = $request->input('timeInput');
        $dateForApplication = $request->input('dateForApplication');
        $metrologName = $request->input('metrologName');
        $statusName = $request->input('statusName');
        $routeSheetNumber = $request->input('routeSheetNumber');

        // Создаем новый маршрутный лист
        $routeSheet = RouteSheet::create([
            'route_sheet_number' => $routeSheetNumber,
            'current_date_time' => now(),
            'author' => $authorName,
            'organization' => $organizationName,
            'time_input' => $timeInput,
            'completion_date' => $dateForApplication,
            'metrolog' => $metrologName,
            'status' => $statusName
        ]);

        // Связываем заявки с маршрутным листом
        foreach ($routeSheetData as $row) {
            $application = Application::where('id', $row['requestId'])->first();

            if ($application) {
                $routeSheet->applications()->attach($application);
            }
        }

        return response()->json(['success' => true, 'message' => 'Маршрутный лист успешно создан']);
    }

    public function viewRouteSheet($route_sheet_number)
    {
        $users = $this->getUsersWithRoleIdTwo();
        $status = $this->getStatuses();
        $organization = $this->getOrganization();
        $routeSheet = RouteSheet::where('route_sheet_number', $route_sheet_number)->first();
        // Здесь вы можете передать данные в вид и отобразить страницу просмотра
        return view('viewRouteSheet', [
            'routeSheet' => $routeSheet,
            'users' => $users,
            'status' => $status,
            'organization' => $organization
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

    public function getOrganization()
    {
        return Organization::all();
    }

}
