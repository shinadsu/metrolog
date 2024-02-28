<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Polygons;
use App\Models\Address;
use App\Models\addressApplication;
use Illuminate\Support\Facades\DB;

class RouteForSingleController extends Controller
{
    public function index()
    {
        return view('RouteMap');
    }

    public function getCoordinatesForRouteSheet()
    {
        // получение координат 
    }

    public function updateCoordindatesRegion()
    {
        // обновление занчения координат в базе
    }

    public function deleteCoordinatesFromMap()
    {
        // удаление маркера с карты
    }

    public function getAddressInfo($applicationId)
    {
        $addressApplication = AddressApplication::where('application_id', $applicationId)->first();

        // Проверка на null
        if ($addressApplication) 
        {
            $address = Address::find($addressApplication->address_id);

            // Проверка на null после запроса к базе данных
            if ($address === null) {
                \Log::error('Address with id ' . $addressApplication->address_id . ' not found in the database.');
                return response()->json(['error' => 'Address not found'], 404);
            }

            return response()->json([
                'id' => $address->id,
                'full_address' => $address->full_address,
                'latitude' => $address->latitude,
                'longitude' => $address->longitude,
            ]);
        }

        return response()->json(['error' => 'AddressApplication not found'], 404);
    }



    public function postAddressStructureForMap(Request $request)
    {
        $applicationIds = $request->input('applicationIds');

        // Проверка на null и массив
        if (empty($applicationIds)) 
        {
            return response()->json(['error' => 'null'], 400);
        }

        $response = [];

        foreach ($applicationIds as $applicationId) 
        {
            $addressInfo = $this->getAddressInfo($applicationId);
            $response[] = $addressInfo->getData();
        }

        

        return response()->json($response);
    }





}
