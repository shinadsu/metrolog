<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addressPayer extends Model
{   
    protected $fillable = ['address_id', 'payer_id'];
    
    protected $table = 'address_payer';
    
    use HasFactory;
}
