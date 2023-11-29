<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fiasTypes extends Model
{
    use HasFactory;

    protected $fillable = ['type_id', 'address_level', 'type_short_name', 'type_name'];
}
