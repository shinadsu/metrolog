<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addressPhone extends Model
{
    protected $fillable = ['address_id', 'phone_id'];
    
    protected $table = 'address_phone';
    
    use HasFactory;
}
