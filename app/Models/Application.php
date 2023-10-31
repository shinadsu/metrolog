<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Application extends Model
{
    protected $fillable = ['fullname', 'status_id', 'type_of_payment', 'author'];

    use HasFactory;

 

    public function status()
    {
        return $this->belongsTo(Statuses::class, 'status_id');
    }
    
    public function addresses()
    {
        return $this->belongsToMany(Address::class, 'address_applications', 'application_id', 'address_id');
    }

    public function metrologs()
    {
        return $this->hasMany(applicationMetrolog::class, 'application_id', 'id');
    }

   
}