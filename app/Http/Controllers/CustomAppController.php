<?php

namespace App\Http\Controllers;

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
use App\Models\addressApplication;
use App\Models\applicationMetrolog;
use App\Models\User;
use App\Models\addressPhone;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CustomAppController extends Controller
{

    public function index()
    {   
        
        $deviceTypes = DeviceTypeGuide::all();
        $grsiNumbers = GrsiNumberGuide::all();
        $Users = User::where('role_id', 2)->get();
        $brands = BrandGuide::all();
        return view('create', compact('brands', 'deviceTypes', 'grsiNumbers', 'Users'));
    }


    public function store(Request $request)
    {   
        $validator = Validator::make($request->all(), [
            // поля валидации
            'fullname' => 'required|string',
            'status' => 'required|string',
            'type_of_payment' => 'required|string',
            'address' => 'required|string',
            'district' => 'required|string',
            'logistic_area' => 'required|string',
            'logistic_floor' => 'required|string',
            'floor' => 'required|string',
            'intercom' => 'required|string',
            'entrance' => 'required|string',
            'guid_c' => 'required|string',
            // 'factory_number' => 'required|string',
            // 'brand' => 'required|string',
            // 'device_type' => 'required|string',
            // 'grsi_number' => 'required|integer',
            // 'scheduled_verification_date' => 'required|date_format:d.m.Y',
            // 'release_year' => 'required|integer',
            // 'modification' => 'required|string',
            // 'type' => 'required|string',
            'actual' => 'required|string',
            'phone_number' => 'required|string',
            'country_code' => 'required|string',
            'payer_code' => 'required|string',
            'city_code' => 'required|string',
            'extension_number' => 'required|string',
        ]);

       if ($validator->fails()) {
            dd($validator->errors());
            return redirect()->back()->withErrors($validator)->withInput();
    }


    try 
    {   
        DB::beginTransaction();

        $application = Application::create($request->only('fullname', 'status', 'type_of_payment'));

        // заполнение адреса
        $addressData = $request->only('address', 'district', 'logistic_area', 'logistic_floor', 'floor', 'intercom', 'entrance', 'guid_c');
        $address = Address::firstOrCreate($addressData);

        // структура заполнения кода плательщика и сводной таблицы плательщиков и адресов
        $payer = Payer::where('payer_code', $request->input('payer_code'))
                    ->where('actual', $request->input('actual'))
                    ->first();

        if (!$payer) {
            $payerData = [
                'actual' => $request->input('actual'),
                'payer_code' => $request->input('payer_code'),
            ];
            $payer = Payer::create($payerData);
        }
        $addressPayer = addressPayer::where('payer_id', $payer->id)
                                    ->first();

        // Если связь существует, выводим ошибку и завершаем выполнение метода
        if ($addressPayer) {
            return redirect()->back()->with('error', 'На данный адрес уже привязан плательщик.');
        }

        // Создаем связь адреса и плательщика
        addressPayer::create([
            'address_id' => $address->id,
            'payer_id' => $payer->id
        ]);
        
        
        // $brand = BrandGuide::firstOrCreate(['brand_name' => $request->input('brand')]);
        // $deviceType = DeviceTypeGuide::firstOrCreate(['device_type_name' => $request->input('device_type')]);
        // $grsiNumber = GrsiNumberGuide::firstOrCreate(['grsi_number_value' => $request->input('grsi_number')]);
        // $deviceData = $request->only('factory_number', 'release_year', 'modification', 'type');
        // $scheduledVerificationDate = Carbon::createFromFormat('d.m.Y', $request->input('scheduled_verification_date'))->format('Y-m-d');
        // $deviceData['scheduled_verification_date'] = $scheduledVerificationDate;
        // $deviceData['brand_id'] = $brand->id;
        // $deviceData['device_type_id'] = $deviceType->id;
        // $deviceData['grsi_number_id'] = $grsiNumber->id;
        // $deviceData['address_id'] = $address->id;
        // $device = Device::firstOrCreate($deviceData);
        
        
        // заполненые сводной таблицы
        // $addressDevicedata = $request->only('address_id', 'device_id');
        // $addressDevicedata['address_id'] = $address->id;
        // $addressDevicedata['device_id'] = $device->id;
        // $addressDevice = addressDevice::create($addressDevicedata);

        $addressApplicationData = $request->only('application_id', 'address_id');
        $addressApplicationData['application_id'] = $application->id;
        $addressApplicationData['address_id'] = $address->id;
        $addressApplication = addressApplication::create($addressApplicationData);

        // заполненые сводной таблицы
        // $addressPayerdata = $request->only('address_id', 'payer_id');
        // $addressPayerdata['address_id'] = $address->id;
        // $addressPayerdata['payer_id'] = $payer->id;
        // $addressPayer = addressPayer::create($addressPayerdata);

        $applicationMetrologdata = $request->only('application_id', 'metrolog_id');
        $applicationMetrologdata['application_id'] = $application->id;
        $applicationMetrologdata['metrolog_id'] = $request->input('metrolog_id');
        $applicationMetrolog = applicationMetrolog::create($applicationMetrologdata);


        $phone = Phone::firstOrCreate([
            'phone_number' => $request->input('phone_number'),
            'country_code' => $request->input('country_code'),
            'city_code' => $request->input('city_code'),
            'extension_number' => $request->input('extension_number'),
        ]);

        // заполненые сводной таблицы
        $addressPhonedata = $request->only('address_id', 'phone_id');
        $addressPhonedata['address_id'] = $address->id;
        $addressPhonedata['phone_id'] = $phone->id;
        $addressPayer = addressPhone::create($addressPhonedata);



        
        // $device->address_id = $address->id;
        $application->save();

        DB::commit();

        return redirect('/')->with('success', 'Заявка успешно отправлена!');
    }   
    catch (\Exception $e) 
    {
        DB::rollBack();
        dd($e);
        return redirect()->back()->with('error', 'Произошла ошибка. Пожалуйста, попробуйте еще раз.');
    }
}
    
}


