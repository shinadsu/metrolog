<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = ['fullname', 'status', 'type_of_payment'];

    use HasFactory;

    public function addresses()
    {
        return $this->belongsToMany(Address::class, 'address_applications', 'application_id', 'address_id');
    }

    public function metrologs()
    {
        return $this->hasMany(applicationMetrolog::class, 'application_id', 'id');
    }
}