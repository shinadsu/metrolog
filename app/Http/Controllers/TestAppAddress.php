<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\addressApplication;
use App\Models\Statuses;


class TestAppAddress extends Controller
{   
    private function getApplicationsWithDetails()
    {
        $result = DB::table('address_applications')
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
            'addresses.combined_address as address',
            'phones.phone_number'
        )
        ->paginate(5); // Указываем количество элементов на странице
        
        $result->getCollection()->transform(function ($item) {
            $combinedAddress = json_decode($item->address, true);
    
            if ($combinedAddress !== null && !empty($combinedAddress)) {
                $lastKey = key(array_slice($combinedAddress, -1, 1, true));
            } else {
                $lastKey = null;
            }
    
            $item->address = isset($combinedAddress[$lastKey]) ? $combinedAddress[$lastKey] : null;
    
            return $item;
        });
        return $result;
    }
    
    

    public function index()
    {
        $appAndAddress = $this->getApplicationsWithDetails();
        $statuses = Statuses::all(); 
        return view('testforapplicationandaddress', compact('appAndAddress', 'statuses'));
    }
}
