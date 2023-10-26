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


class Metrlog extends Controller
{
   public function index()
   {
       $user = Auth::user(); // Получаем текущего авторизованного пользователя (метролога)
       $applications = $user->applications;

       return view('metrlog', compact('applications'));
   }

   public function show($id)
   {  
      $brandsguide = BrandGuide::all();
      $deviceGuide = DeviceTypeGuide::all();
      $GRSIGuide = GrsiNumberGuide::all();

      $application = Application::find($id);

      if (!$application) {
         abort(404); // Или какой-то другой код ошибки, если приложение с таким id не найдено
      }

      $addresses = Address::whereHas('applications', function ($query) use ($id) {
         $query->where('application_id', $id);
      })->get();

      $phoneIds = $addresses->pluck('id')->toArray();
      $phones = Phone::whereIn('id', addressPhone::whereIn('address_id', $phoneIds)->pluck('phone_id'))->get();

      $addressIds = $addresses->pluck('id')->toArray();
      $payers = Payer::whereIn('id', addressPayer::whereIn('address_id', $addressIds)->pluck('payer_id'))->get();

      $deviceIds = $addresses->pluck('id')->toArray();
      $devices = Device::whereIn('id', addressDevice::whereIn('address_id', $deviceIds)->pluck('device_id'))->get();

      return view('metrologshow', compact('application', 'phones', 'payers', 'devices', 'addresses', 'brandsguide', 'deviceGuide', 'GRSIGuide'));
   }



}
