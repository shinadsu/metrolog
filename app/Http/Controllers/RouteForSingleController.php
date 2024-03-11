<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;
use App\Models\Application;
use App\Models\RouteSheet;
use App\Models\RouteSheetApplications;
use App\Models\addressApplication;
use App\Models\PolylineCoordsForRoutes;
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

    

    public function postApplicationsIds(Request $request)
    {
        $applicationIds = $request->input('applicationIds');
        
        // Проверка на null и массив
        if (empty($applicationIds)) {
            return response()->json(['error' => 'applicationIds is empty'], 400);
        }
    
        $response = [];
    
        foreach ($applicationIds as $applicationId) {
            $addressApplications = DB::table('address_applications')
                ->where('applications.id', $applicationId) // Указываем таблицу applications
                ->join('addresses', 'address_applications.address_id', '=', 'addresses.id')
                ->join('applications', 'address_applications.application_id', '=', 'applications.id')
                ->leftJoin('commentaries', 'applications.id', '=', 'commentaries.application_id')
                ->select(
                    'addresses.full_address',
                    'applications.id as applicationId',
                    'applications.totalTimesInput',
                    'applications.selectedPeriod',
                    'commentaries.logistic_commentary'
                   
                )
                ->get();
    
            foreach ($addressApplications as $addressApplication) {
                $response[] = 
                [
                    'applicationId' => $addressApplication->applicationId,
                    'fullAddress' => $addressApplication->full_address,
                    'totalTimesInput' => $addressApplication->totalTimesInput,
                    'selectedPeriod' => $addressApplication->selectedPeriod,
                    'logisticCommentary' => $addressApplication->logistic_commentary,
                   
                ];
            }
        }
    
        // Добавим проверку, если массив $response пустой
        if (empty($response)) 
        {
            return response()->json(['error' => 'No matching addresses found'], 404);
        }
    
        return response()->json($response);
    }

    public function handleOrder(Request $request) 
    {
        // Получение данных из запроса
        $order = $request->input('order');
        $pageNumber = $request->input('pageNumber');
        
        // Вызов дополнительного метода для обработки данных
        $this->processOrder($order, $pageNumber);
    
        // Вернем простой JSON-ответ для примера
        return response()->json(['success' => true, 'order' => $order, 'pageNumber' => $pageNumber]);
    }
    
    
    public function processOrder($order, $pageNumber) 
    {   
        // Шаг 1: Получаем id из таблицы RouteSheet по номеру страницы
        $routeSheetId = RouteSheet::where('route_sheet_number', $pageNumber)->value('id');
        $order = array_map('intval', $order);
    
        if ($routeSheetId) 
        {
            // Шаг 2: Получаем application_id из таблицы RouteSheetApplications для указанного route_sheet_id
            $applications = RouteSheetApplications::where('route_sheet_id', $routeSheetId)
                ->orderBy('id') // Добавим сортировку для предотвращения возможных проблем с порядком
                ->get();
    
            // Шаг 3: Проверяем, что размеры обоих массивов совпадают
            if (count($order) === count($applications)) 
            {
                // Шаг 4: Обновляем порядок application_id в таблице RouteSheetApplications согласно новому порядку
                foreach ($order as $newIndex => $applicationId) 
                {   
                    $application = $applications[$newIndex];
                    $application->update(['application_id' => $order[$newIndex]]);
                }
    
                // Возвращаем успешный результат
                return response()->json(['success' => 'Данные успешно обновлены', 'order' => $order]);
            } 
            else 
            {
                // Если размеры массивов не совпадают
                return response()->json(['success' => false, 'message' => 'Arrays have different sizes']);
            }
        } 
        else 
        {
            // Если не найден route_sheet_id для указанного номера страницы
            return response()->json(['success' => false, 'message' => 'RouteSheet not found for the specified page number']);
        }

    }
    

    
    
    public function updateTableData(Request $request)
    {
        // Decode JSON data from AJAX request
        $requestData = json_decode($request->getContent(), true);
        
        // dd($requestData);
        // Now you can access the decoded data
        $applicationids = $requestData[0]['applicationids'];
        $pageNumber = $requestData[0]['pageNumber'];
    
        $this->processOrder($applicationids, $pageNumber);
    
        return response()->json(['success' => true, 'order' => $applicationids, 'pageNumber' => $pageNumber]);
    }
    
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    
    public function savePolyline(Request $request)
    {
        $routeNumber = intval($request->input('routeNumber'));
        $coordinates = $request->input('coordinates'); // Не декодируйте JSON здесь

        // Сохраняем данные в базу данных
        PolylineCoordsForRoutes::create([
            'routeNumber' => $routeNumber,
            'coordinates' => $coordinates
        ]);

        // Возвращаем успешный ответ
        return response()->json(['success' => true]);
    }

    
    public function loadPolylinesToMap(Request $request)
    {
        $routeNumber = intval($request->input('routeNumber'));

        // Получаем координаты полилинии из базы данных
        $polylineData = PolylineCoordsForRoutes::where('routeNumber', $routeNumber)->first();

        if ($polylineData) {
            $coordinates = $polylineData->coordinates;


            // dd($coordinates);
            // Возвращаем координаты полилинии в виде JSON
            return response()->json(['success' => true, 'coordinates' => $coordinates]);
        } else {
            return response()->json(['success' => false, 'message' => 'Polyline not found']);
        }
    }


    public function loadApplicationdDataFromDB(Request $request)
    {
        try {
            $pageNumber = $request->input('pageNumber');
            $routeSheetId = RouteSheet::where('route_sheet_number', $pageNumber)->value('id');
    
            if ($routeSheetId) {
                $applications = RouteSheetApplications::where('route_sheet_id', $routeSheetId)
                    ->orderBy('id')
                    ->get();
    
                $applicationIds = $applications->pluck('application_id')->toArray();
    
                $response = [];
    
                foreach ($applicationIds as $applicationId) {
                    $addressApplications = DB::table('address_applications')
                        ->where('applications.id', $applicationId)
                        ->join('addresses', 'address_applications.address_id', '=', 'addresses.id')
                        ->join('applications', 'address_applications.application_id', '=', 'applications.id')
                        ->leftJoin('commentaries', 'applications.id', '=', 'commentaries.application_id')
                        ->select(
                            'addresses.full_address',
                            'applications.id as applicationId',
                            'applications.totalTimesInput',
                            'applications.selectedPeriod',
                            'commentaries.logistic_commentary'
                        )
                        ->get();
    
                    foreach ($addressApplications as $addressApplication) {
                        $response[] = [
                            'applicationId' => $addressApplication->applicationId,
                            'fullAddress' => $addressApplication->full_address,
                            'totalTimesInput' => $addressApplication->totalTimesInput,
                            'selectedPeriod' => $addressApplication->selectedPeriod,
                            'logisticCommentary' => $addressApplication->logistic_commentary,
                        ];
                    }
                }

                
    
                // Добавим проверку, если массив $response пустой
                if (empty($response)) {
                    return response()->json(['error' => 'No matching addresses found'], 404);
                }
    
                return response()->json($response);
            } else {
                return response()->json(['error' => 'Route sheet not found'], 404);
            }
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }
    
    







    
    
}

    










