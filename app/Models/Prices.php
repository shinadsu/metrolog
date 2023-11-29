<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prices extends Model
{
    use HasFactory;

    protected $fillable = ['price'];

    public function replacement()
    {
        return $this->hasOne(Replacement::class);
    }

    public function specification()
    {
        return $this->hasOne(specifications::class);
    }

    public function verificationOfСounters()
    {
        return $this->hasOne(verificationOfСounters::class);
    }

    public function plumbingServices()
    {
        return $this->hasOne(plumbingServices::class);
    }

    public function claims()
    {
        return $this->hasOne(claims::class);
    }

    public function additionalWork()
    {
        return $this->hasOne(additionalWork::class);
    }

     
}
