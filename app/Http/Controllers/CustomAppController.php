<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Address;
use App\Models\Phone;
use App\Models\Payer;
use App\Models\additionalWork;
use App\Models\claims;
use App\Models\plumbingServices;
use App\Models\replacement;
use App\Models\specifications;
use App\Models\verificationOfСounters;
use App\Models\addressPayer;
use App\Models\addressApplication;
use App\Models\applicationMetrolog;
use App\Models\Statuses;
use App\Models\statustransitions;
use App\Models\User;
use App\Models\commentary;
use App\Models\addressPhone;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CustomAppController extends Controller
{   



    public function store(Request $request)
    {   
        $validator = Validator::make($request->all(), [
            
            'fullname' => 'required|string',
            'status_id' => 'required|integer',
            'type_of_payment' => 'required|string',
            'productsInfo' => 'required|json',
            'totalPriceValue' => 'required|numeric',
            

            'address' => 'required|string',
            'addressesArea' => 'string|max:255',
            'addressCity' => 'string',
            'addressSettlement' => 'string',
            'addressPlanningStructure' => 'string',
            'addressStreet' => 'string',
            'addressHouse' => 'string',
            'addressApartment' => 'string',


            'logistic_commentary' => 'nullable|string',
            'metrolog_commentary' => 'nullable|string',
            'operator_commentary' => 'nullable|string',


            'payer_code' => 'required|string',
            'actual' => 'required|string',
            

            'phone_number' => 'required|string',
            'country_code' => 'required|string',
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


            $applicationData = $request->only('fullname', 'user_id', 'status_id', 'source', 'type_of_payment', 'totalTimesInput', 'totalPriceValue');
            $datepicker = \DateTime::createFromFormat('d.m.Y H:i', $request->input('datepicker'));
            $applicationData['datepicker'] = $datepicker->format('Y-m-d H:i:s'); // Преобразование в нужный формат
            $productsInfo = json_decode($request->input('productsInfo'), true);
            $applicationData['productsInfo'] = json_encode($productsInfo);
            $applicationData['user_id'] = auth()->user()->id;
            $application = Application::create($applicationData);
            
            
            

        

            $addressData = $request->only(
                'address', 'addressesArea', 'addressCity', 'addressSettlement',
                'addressPlanningStructure', 'addressStreet', 'addressHouse',
                'addressApartment', 'object_guid'
            );

            $fullAddress = $this->buildFullAddress($addressData);

        
            $existingAddress = Address::where('full_address', $fullAddress)->first();

            // Если адрес не найден, создаем новый экземпляр Address
            if (!$existingAddress) {
                $addressData['full_address'] = $fullAddress;
                $address = Address::create($addressData);
            } else {
                // Используем существующий адрес
                $address = $existingAddress;
            }


        
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

            
            if ($addressPayer) {
                return redirect()->back()->with('error', 'На данный адрес уже привязан плательщик.');
            }

        
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
            
            
            // // заполненые сводной таблицы
            // $addressDevicedata = $request->only('address_id', 'device_id');
            // $addressDevicedata['address_id'] = $address->id;
            // $addressDevicedata['device_id'] = $device->id;
            // $addressDevice = addressDevice::create($addressDevicedata);


            // заполненые сводной таблицы
            // $addressPayerdata = $request->only('address_id', 'payer_id');
            // $addressPayerdata['address_id'] = $address->id;
            // $addressPayerdata['payer_id'] = $payer->id;
            // $addressPayer = addressPayer::create($addressPayerdata);

            $addressApplicationData = $request->only('application_id', 'address_id');
            $addressApplicationData['application_id'] = $application->id;
            $addressApplicationData['address_id'] = $address->id;
            $addressApplication = addressApplication::create($addressApplicationData);

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

            
            $addressPhonedata = $request->only('address_id', 'phone_id');
            $addressPhonedata['address_id'] = $address->id;
            $addressPhonedata['phone_id'] = $phone->id;
            $addressPhone = addressPhone::create($addressPhonedata);


            $commentaryData = $request->only('application_id', 'logistic_commentary', 'metrolog_commentary', 'operator_commentary');
            $commentaryData['application_id'] = $application->id;
            $commentary = Commentary::create($commentaryData);
            
        
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

    private function buildFullAddress($addressData)
    {
        $fullAddress = '';

        // Собираем полный адрес, добавляя к каждому не пустому полю соответствующий разделитель
        foreach ($addressData as $value) {
            if (!empty($value)) {
                $fullAddress .= $value . ', ';
            }
        }

        // Убираем последнюю запятую и пробел
        $fullAddress = rtrim($fullAddress, ', ');

        return $fullAddress;
    }



    public function index(Request $request)
    {   

        $user = auth()->user();
        if ($user && $user->role_id !== null) 
        {
            $roleId = $user->role_id;
        } 
        else 
        {
           dd('error');
        }
        $Users = User::where('role_id', 2)->get();    
        $allowedStatuses = statustransitions::where('role_id', $roleId)
                                        ->where('base_status_id', 5)
                                        ->pluck('new_status_id');

        $statuses = Statuses::whereIn('id', $allowedStatuses)->get(); 

        $applicationsWithDetails = DB::table('address_applications')
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
            'addresses.full_address as address',
            'phones.phone_number'
        )
        ->paginate(10);

        $additionalWork = additionalWork::with('price')->get();

        $claims = claims::with('price')->get();

        $plumbingServices = plumbingServices::with('price')->get();

        $verificationOfCounters = verificationOfСounters::with('price')->get();

        $specifications = specifications::with('price')->get();

        $replacements = Replacement::with('price')->get();
        
        return view('create', compact('applicationsWithDetails', 'statuses', 'Users', 'request', 'additionalWork', 'claims', 'plumbingServices', 'verificationOfCounters', 'specifications', 'replacements'));
    }


   

}


