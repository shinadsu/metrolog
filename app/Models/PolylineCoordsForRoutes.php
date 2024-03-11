<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PolylineCoordsForRoutes extends Model
{
    use HasFactory;

    protected $table = 'polyline_coords_for_routes';

    protected $fillable = ['routeNumber', 'coordinates'];

    public $timestamps = false; // Отключает использование created_at и updated_at
}
