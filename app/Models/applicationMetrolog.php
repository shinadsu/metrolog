<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class applicationMetrolog extends Model
{
    use HasFactory;

    protected $fillable = ['application_id', 'metrolog_id'];

    protected $table = 'application_metrologs';
    
}
