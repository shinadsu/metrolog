<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = ['address', 'district', 'logistic_area', 'logistic_floor', 'floor', 'intercom', 'entrance', 'guid_c'];

    public function applications()
    {
        return $this->belongsToMany(Application::class, 'address_applications', 'address_id', 'application_id');
    }

    public function phones()
    {
        return $this->belongsToMany(Phone::class, 'address_phone', 'address_id', 'phone_id');
    }
}

