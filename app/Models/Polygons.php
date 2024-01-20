<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Polygons extends Model
{
    use HasFactory;

    protected $fillable = ['coordinates'];

    protected $casts = [
        'coordinates' => 'json',
    ];
}
