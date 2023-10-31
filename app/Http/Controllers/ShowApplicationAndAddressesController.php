<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use Illuminate\Support\Facades\DB;

class ShowApplicationAndAddressesController extends Controller
{

    public function index()
    {
        $applicationsWithDetails = DB::table('address_applications')
            ->join('applications', 'address_applications.application_id', '=', 'applications.id')
            ->join('addresses', 'address_applications.address_id', '=', 'addresses.id')
            ->leftJoin('address_phone', 'address_applications.address_id', '=', 'address_phone.address_id')
            ->leftJoin('phones', 'address_phone.phone_id', '=', 'phones.id')
            ->select(
                'applications.id as application_id',
                'applications.fullname',
                'applications.status_id',
                'applications.type_of_payment',
                'addresses.id as address_id',
                'addresses.address',
                'phones.phone_number'
            )
            ->get();

        return view('applicationandaddresses', compact('applicationsWithDetails'));
    }



}




