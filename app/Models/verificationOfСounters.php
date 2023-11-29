<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class verificationOfСounters extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price_id'];

    public function price()
    {
        return $this->belongsTo(Prices::class);
    }
}
