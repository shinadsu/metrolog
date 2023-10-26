<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Device;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ShowDeviceController extends Controller
{
    public function index()
    {
        $devices = DB::table('devices')
            ->join('brand_guides', 'devices.brand_id', '=', 'brand_guides.id')
            ->join('device_type_guides', 'devices.device_type_id', '=', 'device_type_guides.id')
            ->join('grsi_number_guides', 'devices.grsi_number_id', '=', 'grsi_number_guides.id')
            ->select(
                'devices.id',
                'devices.factory_number',
                'brand_guides.brand_name',
                'device_type_guides.device_type_name',
                'grsi_number_guides.grsi_number_value',
                'devices.scheduled_verification_date',
                'devices.release_year',
                'devices.modification',
                'devices.type'
            )
            ->get();

        return view('device', compact('devices'));
    }

}