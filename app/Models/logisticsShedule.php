<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class logisticsShedule extends Model
{
    use HasFactory;


    protected $fillable = ['logist_id',
    'date',
    'start_date',
    'end_date' ,
    'is_scheduled' ,
    'reasonForNot'];
    
    public function user()
    {
        return $this->belongsTo(User::class, 'logist_id');
    }

    public function getIsSchedulerAttribute($value)
    {
        return $value ? 'Да' : 'Нет';
    }

    public function setStartDateAttribute($value)
    {
        // Преобразование из формата формы в формат базы данных
        $this->attributes['start_date'] = \Carbon\Carbon::createFromFormat('Y-m-d\TH:i', $value)->toDateTimeString();
    }
}
