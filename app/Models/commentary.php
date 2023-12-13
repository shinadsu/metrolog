<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class commentary extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['application_id', 'logistic_commentary', 'metrolog_commentary', 'operator_commentary'];
}
