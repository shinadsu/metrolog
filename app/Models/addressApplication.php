<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addressApplication extends Model
{   
    protected $fillable = ['application_id', 'address_id'];
    protected $table = 'address_applications';

    use HasFactory;
}
