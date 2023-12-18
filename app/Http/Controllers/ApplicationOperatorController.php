<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Address;
use App\Models\Device;
use App\Models\Phone;
use App\Models\Payer;
use App\Models\BrandGuide;
use App\Models\DeviceTypeGuide;
use App\Models\addressDevice;
use App\Models\GrsiNumberGuide;
use App\Models\addressPayer;
use App\Models\addressPhone;
use App\Models\Statuses;

class ApplicationOperatorController extends Controller
{
    public function show($id)
    {
        $brandsguide = BrandGuide::all();
        $deviceGuide = DeviceTypeGuide::all();
        $GRSIGuide = GrsiNumberGuide::all();
        $status = Statuses::all();
        $application = Application::find($id);
    
        if (!$application) {
            abort(404); // Или какой-то другой код ошибки, если приложение с таким id не найдено
        }
    
        $addresses = Address::whereHas('applications', function ($query) use ($id) {
            $query->where('application_id', $id);
        })->get();
 
         $processedAddresses = $addresses->map(function ($address) 
         {
             $address->address = $address->full_address;
             return $address;
         });
 
     
        $phoneIds = $processedAddresses->pluck('id')->toArray();
        $phones = Phone::whereIn('id', AddressPhone::whereIn('address_id', $phoneIds)->pluck('phone_id'))->get();
    
        $addressIds = $processedAddresses->pluck('id')->toArray();
        $payers = Payer::whereIn('id', AddressPayer::whereIn('address_id', $addressIds)->pluck('payer_id'))->get();
    
        $deviceIds = $processedAddresses->pluck('id')->toArray();
        $devices = Device::whereIn('id', AddressDevice::whereIn('address_id', $deviceIds)->pluck('device_id'))->get();
    
        return view('operatorview', [
            'application' => $application,
            'status' => $status,
            'phones' => $phones,
            'payers' => $payers,
            'devices' => $devices,
            'addresses' => $processedAddresses,
            'brandsguide' => $brandsguide,
            'deviceGuide' => $deviceGuide,
            'GRSIGuide' => $GRSIGuide,
        ]);
    }
    
}