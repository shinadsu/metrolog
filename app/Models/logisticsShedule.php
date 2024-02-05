<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class logisticsShedule extends Model
{
    use HasFactory;


    protected $fillable = ['logist_id', 'uniqIdentefy', 'start_date', 'end_date', 'is_scheduled', 'reasonForNot', 'commentary'];
    
    public function user()
    {
        return $this->belongsTo(User::class, 'logist_id');
    }

    public function getIsSchedulerAttribute($value)
    {
        return $value ? 'Да' : 'Нет';
    }

}
