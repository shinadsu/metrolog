<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeviceTypeGuide extends Model
{   
    protected $fillable = ['device_type_name'];
    use HasFactory;

   
}
