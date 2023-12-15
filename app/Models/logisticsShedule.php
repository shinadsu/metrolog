<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class logisticsShedule extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'logist_id');
    }

    public function getIsSchedulerAttribute($value)
    {
        return $value ? 'Да' : 'Нет';
    }

}
