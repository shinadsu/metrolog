<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetrologSheduler extends Model
{
    use HasFactory;

    protected $fillable = ['metrolog_id', 'date_start', 'is_working_day', 'day_off', 'sick_leave', 'other_leave'];
    public function user()
    {
        return $this->belongsTo(User::class, 'metrolog_id');
    }

}
