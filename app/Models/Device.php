<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Device extends Model
{
    protected $fillable = 
    [
    'factory_number', 
    'brand_id', 
    'address_id',
    'device_type_id', 
    'grsi_number_id', 
    'scheduled_verification_date', 
    'release_year', 
    'modification', 
    'type'
    ];

    public function brand()
    {
        return $this->belongsTo(BrandGuide::class, 'brand_id');
    }

    public function deviceType()
    {
        return $this->belongsTo(DeviceTypeGuide::class, 'device_type_id');
    }

    public function grsiNumber()
    {
        return $this->belongsTo(GrsiNumberGuide::class, 'grsi_number_id');
    }
}

