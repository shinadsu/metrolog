<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GrsiNumberGuide;
use App\Models\DeviceTypeGuide;
use App\Models\addressDevice;
use App\Models\BrandGuide;
use Carbon\Carbon;
use App\Models\Address;
use Illuminate\Support\Facades\Validator;
use App\Models\Device;

class DeviceController extends Controller
{
    public function index()
    {
        
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // поля валидации
            'factory_number' => 'required|string',
            'brand' => 'required|string',
            'device_type' => 'required|string',
            'grsi_number' => 'required|integer',
            'scheduled_verification_date' => 'required|date_format:d.m.Y',
            'release_year' => 'required|integer',
            'modification' => 'required|string',
            'type' => 'required|string',
        ]);

       if ($validator->fails()) {
            dd($validator->errors());
            return redirect()->back()->withErrors($validator)->withInput();
    }

        try {

            $address = Address::findOrFail($request->input('address_id'));

            $brand = BrandGuide::firstOrCreate(['brand_name' => $request->input('brand')]);
            $deviceType = DeviceTypeGuide::firstOrCreate(['device_type_name' => $request->input('device_type')]);
            $grsiNumber = GrsiNumberGuide::firstOrCreate(['grsi_number_value' => $request->input('grsi_number')]);
            $deviceData = $request->only('factory_number', 'release_year', 'modification', 'type');
            $scheduledVerificationDate = Carbon::createFromFormat('d.m.Y', $request->input('scheduled_verification_date'))->format('Y-m-d');
            $deviceData['scheduled_verification_date'] = $scheduledVerificationDate;
            $deviceData['brand_id'] = $brand->id;
            $deviceData['device_type_id'] = $deviceType->id;
            $deviceData['grsi_number_id'] = $grsiNumber->id;
            $deviceData['address_id'] = $address->id;
            $device = Device::firstOrCreate($deviceData);

            $addressDevicedata = $request->only('address_id', 'device_id');
            $addressDevicedata['address_id'] = $address->id;
            $addressDevicedata['device_id'] = $device->id;
            $addressDevice = addressDevice::create($addressDevicedata);
    
            
            return redirect()->back()->with('success', 'Устройство успешно добавлено.');
        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->back()->withInput()->withErrors(['error' => 'Произошла ошибка. Пожалуйста, попробуйте снова.']);
        }
    }
}
