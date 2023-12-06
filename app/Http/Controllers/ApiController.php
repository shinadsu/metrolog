<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{

    
    // public function getAddressHint(Request $request) 
    // {
    //     $token = 'c8ecfd58-5354-4299-95b0-d94e8060e81d';
    //     $url = 'https://fias-public-service.nalog.ru/api/spas/v2.0/GetRegions';

    //     $ch = curl_init($url);

    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //     curl_setopt($ch, CURLOPT_HTTPHEADER, [
    //         'accept: application/json',
    //         'master-token: ' . $token
    //     ]);
    //     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    //     curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

    //     $response = curl_exec($ch);

    //     if(curl_errno($ch)){
    //         return response()->json(['error' => 'Curl error: ' . curl_error($ch)], 500);
    //     }

    //     curl_close($ch);

    //     $data = json_decode($response, true);
    //     $apiResponse = [];

    //     if (isset($data['addresses']) && is_array($data['addresses'])) {
    //         foreach ($data['addresses'] as $address) {
    //             if (isset($address['full_name'])) {
    //                 $apiResponse[] = $address['full_name'];
    //             }
    //         }
    //     } else {
    //         $apiResponse[] = 'Нет данных об адресах или массив не является корректным массивом.';
    //     }

    //     return response()->json(['hints' => $apiResponse]);
    // }


    // public function searchAddressHint(Request $request)
    // {
    //     $searchString = $request->input('search_string');
    //     $addressType = 1; 

    //     $url = 'https://fias-public-service.nalog.ru/api/spas/v2.0/GetAddressHint';
    //     $headers = [
    //         'accept: application/json',
    //         'master-token: c8ecfd58-5354-4299-95b0-d94e8060e81d'
    //     ];

    //     $ch = curl_init($url . '?search_string=' . urlencode($searchString) . '&address_type=' . $addressType);
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //     curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    //     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    //     curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

    //     $response = curl_exec($ch);

    //     if (curl_errno($ch)) {
    //         return response()->json(['error' => 'Curl error: ' . curl_error($ch)], 500);
    //     }

    //     curl_close($ch);

    //     $responseData = json_decode($response, true);
    //     $hints = [];
        
    //     if (isset($responseData['hints']) && is_array($responseData['hints'])) {
    //         foreach ($responseData['hints'] as $hint) {
    //             if (isset($hint['full_name'])) {
    //                 $hints[] = $hint['full_name'];
    //             }
    //         }
    //     }

    //     return response()->json(['hints' => $hints]);
    //     }



        public function getAddressItems(Request $request) 
        {
            $token = 'c8ecfd58-5354-4299-95b0-d94e8060e81d';
            $url = 'https://fias-public-service.nalog.ru/api/spas/v2.0/GetAddressItems';
    
            $data = [
                'address_level' => 1
            ];
    
            $headers = [
                'accept: application/json',
                'master-token: ' . $token,
                'Content-Type: application/json'
            ];
    
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            
    
            $response = curl_exec($ch);
    
            if(curl_errno($ch)){
                return response()->json(['error' => 'Curl error: ' . curl_error($ch)], 500);
            }
    
            curl_close($ch);
    
            $data = json_decode($response, true);
            $apiResponse = [];
    
            if (isset($data['addresses']) && is_array($data['addresses'])) {
                foreach ($data['addresses'] as $address) {
                    if (isset($address['full_name'])) {
                        $apiResponse[] = ['full_name' => $address['full_name'], 'object_id' => $address['object_id']];
                    }
                }
            } else {
                $apiResponse[] = 'Нет данных об адресах или массив не является корректным массивом.';
            }
    
            return response()->json(['addresses' => $apiResponse]);
        }


        public function postAddress(Request $request)
        {

            /*

            LoadLevels(2, 'City');
            LoadLevels(4, 'CitySettelment');
            LoadLevels(5, 'City');
            LoadLevels(6, 'Settelment');
            LoadLevels(7, 'PlanningStructure');
            LoadLevels(8, 'Street');
            LoadLevels(9, 'Stead');
            LoadLevels(10, 'House');
            LoadLevels(11, 'Apartment');
            LoadLevels(12, 'Room');
            LoadLevels(17, 'CarPlace');

            */

            $objectID = $request->input('selectedAddress');

            $token = 'c8ecfd58-5354-4299-95b0-d94e8060e81d';
            $url = 'https://fias-public-service.nalog.ru/api/spas/v2.0/GetAddressItems';
        
            $headers = [
                'Accept: application/json; ',
                'master-token: ' . $token,
                'Content-Type: application/json; charset=utf-8'
            ];
        
            $addressLevels = [2, 4, 5, 6, 7, 8, 9, 10, 11, 12, 17];
            $addresses = [];
        
            foreach ($addressLevels as $level) 
            {
                $data = [
                    'address_levels' => [$level],
                    'address_type' => 1,
                    'path' => $objectID
                ];
                // print_r($data);
                // die();

                $newdata = json_encode($data);
        
                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
                curl_setopt($ch, CURLOPT_POSTFIELDS, $newdata);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        
                $response = curl_exec($ch);
        
                if (curl_errno($ch)) {
                    echo 'Ошибка в запросе: ' . curl_error($ch);
                }
        
                curl_close($ch);
        
                $datanew2 = json_decode($response, true);

                // Проверяем, что есть адреса в ответе и что это не пустой JSON
                if (isset($datanew2['addresses']) && is_array($datanew2['addresses']) && count($datanew2['addresses']) > 0) {
                    foreach ($datanew2['addresses'] as $address) {
                        if (isset($address['full_name']) && !empty($address['full_name']) && isset($address['object_id'])) {
                            $objectLevelId = $address['object_level_id'];
                            $typeShortName = $this->getTypeShortName($address['hierarchy'], $objectLevelId);
                    
                            // Создание нового массива для ключа, если он еще не существует
                            if (!isset($addresses[$objectLevelId])) {
                                $addresses[$objectLevelId] = [];
                            }
                    
                            // Сохранение полного имени и ID адреса в массиве
                            $addresses[$objectLevelId][] = [
                                'full_name' => $typeShortName,
                                'object_id' => $address['object_id'],
                                'object_guid' => $address['object_guid']
                            ];
                        } else {
                            echo 'Error: Address does not exist';
                        }
                    }
                }
            }
            return response()->json(['addresses' => $addresses]);
        }
        
        public function postNewAddress(Request $request)
        {

            /*

            LoadLevels(2, 'City');
            LoadLevels(4, 'CitySettelment');
            LoadLevels(5, 'City');
            LoadLevels(6, 'Settelment');
            LoadLevels(7, 'PlanningStructure');
            LoadLevels(8, 'Street');
            LoadLevels(9, 'Stead');
            LoadLevels(10, 'House');
            LoadLevels(11, 'Apartment');
            LoadLevels(12, 'Room');
            LoadLevels(17, 'CarPlace');

            */

            $objectID = $request->input('objectID');
            $path = $request->input('path');
            

            $token = 'c8ecfd58-5354-4299-95b0-d94e8060e81d';
            $url = 'https://fias-public-service.nalog.ru/api/spas/v2.0/GetAddressItems';
        
            $headers = [
                'Accept: application/json; ',
                'master-token: ' . $token,
                'Content-Type: application/json; charset=utf-8'
            ];
        
            $addressLevels = [2, 4, 5, 6, 7, 8, 9, 10, 11, 12, 17];
            $addresses = [];
        
            foreach ($addressLevels as $level) 
            {
                $data = [
                    'address_levels' => [$level],
                    'address_type' => 1,
                    'path' => $objectID. "." . $path,
                ];
                // print_r($data);
                // die();

                $newdata = json_encode($data);
        
                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
                curl_setopt($ch, CURLOPT_POSTFIELDS, $newdata);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        
                $response = curl_exec($ch);
        
                if (curl_errno($ch)) {
                    echo 'Ошибка в запросе: ' . curl_error($ch);
                }
        
                curl_close($ch);
        
                $datanew2 = json_decode($response, true);
        
                // Проверяем, что есть адреса в ответе и что это не пустой JSON
                if (isset($datanew2['addresses']) && is_array($datanew2['addresses']) && count($datanew2['addresses']) > 0) {
                    foreach ($datanew2['addresses'] as $address) {
                        if (isset($address['full_name']) && !empty($address['full_name']) && isset($address['object_id'])) {
                            $objectLevelId = $address['object_level_id'];
                            $typeShortName = $this->getTypeShortName($address['hierarchy'], $objectLevelId);
                    
                            // Создание нового массива для ключа, если он еще не существует
                            if (!isset($addresses[$objectLevelId])) {
                                $addresses[$objectLevelId] = [];
                            }
                    
                            // Сохранение полного имени и ID адреса в массиве
                            $addresses[$objectLevelId][] = [
                                'full_name' => $typeShortName,
                                'object_id' => $address['object_id'],
                                'object_guid' => $address['object_guid']
                            ];
                        } else {
                            echo 'Error: Address does not exist';
                        }
                    }
                }
                
            }
            return response()->json(['addresses' => $addresses]);
        }


        private function getTypeShortName($hierarchy, $objectLevelId)
        {
            $lastFullNameShort = '';
            foreach ($hierarchy as $level) {
                if ($level['object_level_id'] == $objectLevelId) {
                    $lastFullNameShort = $level['full_name_short'];
                }
            }
            return $lastFullNameShort;
        }
}
