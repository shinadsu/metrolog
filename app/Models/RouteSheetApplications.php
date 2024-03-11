<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RouteSheetApplications extends Model
{
    use HasFactory;
    
    protected $fillable = ['id', 'route_sheet_id', 'application_id'];
}
