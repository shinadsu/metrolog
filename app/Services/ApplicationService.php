<?php
// app/Services/ApplicationService.php
namespace App\Services;



use App\Models\Application;
use App\Models\Address;
use App\Models\Phone;
use App\Models\Payer;
use App\Models\addressPayer;
use App\Models\addressApplication;
use App\Models\applicationMetrolog;
use App\Models\commentary;
use App\Models\addressPhone;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ApplicationService
{
    public function storeApplication($request)
    {
        $validator = $this->validateRequest($request);

        if ($validator->fails()) {
            dd($validator->errors());
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            DB::beginTransaction();

            $application = $this->createApplication($request);
            $address = $this->createOrUpdateAddress($request);
            $payer = $this->createOrUpdatePayer($request);
            $this->attachPayerToAddress($payer, $address);

            $this->createOrUpdateAddressApplication($application, $address);
            $this->createOrUpdateApplicationMetrolog($application, $request);

            $phone = $this->createOrUpdatePhone($request);
            $this->attachPhoneToAddress($phone, $address);

            $this->createOrUpdateCommentary($application, $request);

            DB::commit();

            return redirect('/')->with('success', 'Заявка успешно отправлена!');
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
            return redirect()->back()->with('error', 'Произошла ошибка. Пожалуйста, попробуйте еще раз.');
        }
    }

    private function validateRequest($request)
    {
        return Validator::make($request->all(), [
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
    }

    private function createApplication($request)
    {
        $applicationData = $request->only('fullname', 'user_id', 'status_id', 'type_of_payment', 'totalPriceValue');
        $productsInfo = json_decode($request->input('productsInfo'), true);
        $applicationData['productsInfo'] = json_encode($productsInfo);
        $applicationData['user_id'] = auth()->user()->id;

        return Application::create($applicationData);
    }

    private function createOrUpdateAddress($request)
    {
        $addressData = $request->only(
            'address', 'addressesArea', 'addressCity', 'addressSettlement',
            'addressPlanningStructure', 'addressStreet', 'addressHouse',
            'addressApartment', 'object_guid'
        );

        $fullAddress = $this->buildFullAddress($addressData);
        $addressData['full_address'] = $fullAddress;

        return Address::firstOrCreate($addressData);
    }

    private function createOrUpdatePayer($request)
    {
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

        return $payer;
    }

    private function attachPayerToAddress($payer, $address)
    {
        $addressPayer = addressPayer::where('payer_id', $payer->id)
            ->first();

        if (!$addressPayer) {
            addressPayer::create([
                'address_id' => $address->id,
                'payer_id' => $payer->id
            ]);
        }
    }

    private function createOrUpdateAddressApplication($application, $address)
    {
        addressApplication::updateOrCreate(
            ['application_id' => $application->id],
            ['address_id' => $address->id]
        );
    }

    private function createOrUpdateApplicationMetrolog($application, $request)
    {
        applicationMetrolog::updateOrCreate(
            ['application_id' => $application->id],
            ['metrolog_id' => $request->input('metrolog_id')]
        );
    }

    private function createOrUpdatePhone($request)
    {
        return Phone::firstOrCreate([
            'phone_number' => $request->input('phone_number'),
            'country_code' => $request->input('country_code'),
            'city_code' => $request->input('city_code'),
            'extension_number' => $request->input('extension_number'),
        ]);
    }

    private function attachPhoneToAddress($phone, $address)
    {
        addressPhone::updateOrCreate(
            ['address_id' => $address->id],
            ['phone_id' => $phone->id]
        );
    }

    private function createOrUpdateCommentary($application, $request)
    {
        Commentary::updateOrCreate(
            ['application_id' => $application->id],
            [
                'logistic_commentary' => $request->input('logistic_commentary'),
                'metrolog_commentary' => $request->input('metrolog_commentary'),
                'operator_commentary' => $request->input('operator_commentary'),
            ]
        );
    }

    private function buildFullAddress($addressData)
    {
        $fullAddress = '';

        foreach ($addressData as $value) {
            if (!empty($value)) {
                $fullAddress .= $value . ', ';
            }
        }

        return rtrim($fullAddress, ', ');
    }
}
