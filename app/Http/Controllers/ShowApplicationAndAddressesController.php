<?php

namespace App\Http\Controllers;

use App\Services\UserRequisitesSettingsService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ShowApplicationAndAddressesController extends Controller
{
    private $userRequisitesSettingsService; // Объявляем переменную как свойство класса

    public function __construct(UserRequisitesSettingsService $userRequisitesSettingsService)
    {
        $this->userRequisitesSettingsService = $userRequisitesSettingsService;
    }

    private function getApplicationsWithDetails($userRole)
    {
        return DB::table('address_applications')
            ->join('applications', 'address_applications.application_id', '=', 'applications.id')
            ->join('addresses', 'address_applications.address_id', '=', 'addresses.id')
            ->leftJoin('address_phone', 'address_applications.address_id', '=', 'address_phone.address_id')
            ->leftJoin('phones', 'address_phone.phone_id', '=', 'phones.id')
            ->leftJoin('statuses', 'applications.status_id', '=', 'statuses.id')
            ->leftJoin('users', 'applications.user_id', '=', 'users.id')
            ->select(
                'applications.id as application_id',
                'applications.fullname',
                'statuses.name as status_name',
                'applications.status_id as status_id',
                'applications.type_of_payment',
                'users.name as user_name',
                'applications.user_id as user_id',
                'addresses.id as address_id',
                'addresses.address',
                'phones.phone_number'
            )
            ->get();
    }

    public function index()
{
    $user = Auth::user();
    $userRole = $user->role_id;
    $applicationsWithDetails = $this->getApplicationsWithDetails($userRole);
    $userRequisitesSettingsService = new UserRequisitesSettingsService();

    return view('applicationandaddresses', compact('applicationsWithDetails', 'userRole', 'userRequisitesSettingsService', 'user'));
}



    // Остальные методы контроллера...
}
