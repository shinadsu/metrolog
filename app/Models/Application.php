<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Application extends Model
{
    protected $fillable = [
    'fullname', 'user_id', 
    'status_id', 'source', 
    'dateForApplication', 'selectedPeriod', 
    'organization', 'type_of_payment', 
    'totalTimesInput', 'totalPriceValue', 
    'productsInfo'];

    use HasFactory;

    public function status()
    {
        return $this->belongsTo(Statuses::class, 'status_id');
    }

    public function addressApplications()
    {
        return $this->belongsToMany(Address::class, 'address_applications', 'application_id', 'address_id');
    }
    
    public function addresses()
    {
        return $this->belongsToMany(Address::class, 'address_applications', 'application_id', 'address_id');
    }

    public function metrologs()
    {
        return $this->hasMany(applicationMetrolog::class, 'application_id', 'id');
    }

    public function commentary()
    {
        return $this->hasOne(commentary::class, 'application_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function routeSheets()
    {
        return $this->belongsToMany(RouteSheet::class, 'route_sheet_applications');
    }
    
   
}