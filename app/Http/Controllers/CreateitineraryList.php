<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\User;
use App\Models\Statuses;
use App\Models\Organization;

class CreateitineraryList extends Controller
{
    public function index(Request $request)
    {
        $users = $this->getUsersWithRoleIdTwo();
        $status = $this->getStatuses();
        $organization = $this->getOrganization();
        $applications = $this->getAllApplicationsWithOtherModels();

        $currentUserName = auth()->user()->name;

        return view('CreateitineraryList', [
            'applications' => $applications,
            'users' => $users,
            'status' => $status,
            'organization' => $organization,
            'currentUserName' => $currentUserName,
        ]);
    }


    public function getAllApplicationsWithFilters() 
    {
        $applications = $this->getAllApplicationsWithOtherModels();
        return response()->json(['success' => true, 'data' => $applications]);
    }

   

    public function getAllApplicationsWithOtherModels()
    {
        $applications = Application::with(['status', 'metrologs.metrolog', 'addresses', 'commentary'])->get();
        return $applications;
    }

    

    public function getApplicationById($id)
    {
        $foundApplications = Application::where('id', 'like', $id . '%')->get();

        // Проверяем, найдены ли заявки с указанным ID
        if (!$foundApplications->isEmpty()) {
            // Объявляем массив для хранения данных о заявках
            $responseData = [];

            foreach ($foundApplications as $application) {
                // Загружаем связанные адреса из таблицы address_applications
                $addresses = $application->addresses;
                $statusName = $application->status->name;
                $productsInfoKeys = array_keys(json_decode($application->productsInfo, true));

                // Загружаем связанный комментарий из таблицы commentaries
                $commentary = $application->commentary;

                // Собираем данные для текущей заявки
                $responseData[] = [
                    'id' => $application->id,
                    'created_at' => $application->created_at->toDateString(),
                    'status_name' => $statusName,
                    'productsInfo' => $productsInfoKeys,
                    'selectedPeriod' => $application->selectedPeriod,
                    'dateForApplication' => $application->dateForApplication,
                    'logistic_commentary' => $commentary ? $commentary->logistic_commentary : null,
                    'timeForApplication' => $application->totalTimesInput,
                    'address' => $addresses->pluck('full_address'), // Предполагается, что у Address есть поле full_address
                    // Добавьте другие поля, если они есть
                ];
            }

            // Возвращаем данные в формате JSON
            return response()->json(['success' => true, 'data' => $responseData]);
        } else {
            // Если заявки не найдены, возвращаем сообщение об ошибке
            return response()->json(['success' => false, 'message' => 'dosent exist'], 404);
        }
    }

    public function getOrganization()
    {
        return Organization::all();
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
