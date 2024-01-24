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
        $applications = Application::with(['status', 'metrologs.metrolog', 'addresses'])->get();


        return view('CreateitineraryList', [
            'applications' => $applications, 
            'users' => $users, 
            'status' => $status,
            'organization' => $organization]);
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
