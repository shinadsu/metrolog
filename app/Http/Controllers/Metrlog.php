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
use App\Models\addressPhone;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Statuses;


class Metrlog extends Controller
{
   public function index()
   {
       $user = Auth::user(); // Получаем текущего авторизованного пользователя (метролога)
       $applications = $user->applications->load('status');
       

       return view('metrlog', compact('applications'));
   }

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

       $processedAddresses = $addresses->map(function ($address) {
         $combinedAddress = $address->combined_address;
     
         // Проверяем, является ли $combinedAddress строкой JSON
         if (is_string($combinedAddress)) {
             // Если строка JSON, преобразуем ее в массив
             $combinedAddress = json_decode($combinedAddress, true);
     
             // Проверяем успешность декодирования JSON
             if (json_last_error() !== JSON_ERROR_NONE) {
                 // Обработка ошибки декодирования
                 $combinedAddress = [];
             }
         }
     
         // Проверяем, что $combinedAddress является массивом и не пуст
         if (is_array($combinedAddress) && !empty($combinedAddress)) {
             // Получаем последний ключ
             $lastKey = key(array_slice($combinedAddress, -1, 1, true));
     
             // Присваиваем значение address значения последнего ключа
             $address->address = isset($combinedAddress[$lastKey]) ? $combinedAddress[$lastKey] : null;
         } else {
             // Если $combinedAddress не является массивом или пуст, присваиваем null
             $address->address = null;
         }
     
         return $address;
     });
     

     
     
     
   
       $phoneIds = $processedAddresses->pluck('id')->toArray();
       $phones = Phone::whereIn('id', AddressPhone::whereIn('address_id', $phoneIds)->pluck('phone_id'))->get();
   
       $addressIds = $processedAddresses->pluck('id')->toArray();
       $payers = Payer::whereIn('id', AddressPayer::whereIn('address_id', $addressIds)->pluck('payer_id'))->get();
   
       $deviceIds = $processedAddresses->pluck('id')->toArray();
       $devices = Device::whereIn('id', AddressDevice::whereIn('address_id', $deviceIds)->pluck('device_id'))->get();
   
       return view('metrologshow', [
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
