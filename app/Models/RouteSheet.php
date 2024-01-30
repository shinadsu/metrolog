<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RouteSheet extends Model
{
    use HasFactory;
    protected $fillable = ['route_sheet_number', 'current_date_time', 'author', 'organization', 'time_input', 
    'completion_date', 'metrolog', 'status'];

    public function applications()
    {
        return $this->belongsToMany(Application::class, 'route_sheet_applications');
    }
}
