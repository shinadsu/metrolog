<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addressDevice extends Model
{   
    protected $fillable = ['address_id', 'device_id'];
    
    protected $table = 'address_device';

    use HasFactory;
}
