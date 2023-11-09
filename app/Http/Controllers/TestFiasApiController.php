<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestFiasApiController extends Controller
{
    public function index(Request $request)
    {   
        $token = 'c8ecfd58-5354-4299-95b0-d94e8060e81d';
        $url = 'https://fias-public-service.nalog.ru/api/spas/v2.0/GetRegions';

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'accept: application/json',
            'master-token: ' . $token
        ]);

        $response = curl_exec($ch);
        curl_close($ch);

        if ($response) 
        {
            $data = json_decode($response, true);
            if (isset($data['addresses'])) 
            {
                foreach ($data['addresses'] as $address) 
                {
                    echo $address['full_name'] . '<br>';
                }
            } 
            else 
            {
                echo 'Нет данных об адресах.';
            }
        } 
        else 
        {
            echo 'Ошибка при выполнении запроса.';
        }
            return view("tesfiasapi");
        }
}
