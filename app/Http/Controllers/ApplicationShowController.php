<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Support\Facades\DB;


class ApplicationShowController extends Controller
{
    public function index()
    {
        $applications = Application::join('address_applications', 'applications.id', '=', 'address_applications.application_id')
        ->join('addresses', 'address_applications.address_id', '=', 'addresses.id')
        ->select('applications.fullname', 'applications.status', 'applications.type_of_payment', 'addresses.address')
        ->get();


        // dd($applications);

        return view('ShowApplication', compact('applications'));
    }
}
