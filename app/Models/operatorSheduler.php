<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class operatorSheduler extends Model
{   
    protected $fillable = [
        'operator_id', 'date_start', 
        'date_end', 'is_working_day',
        'incoming', 'outgoing',
        'day_off', 'sick_leave',
        'other_leave', 'comment',
    ];

    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'operator_id');
    }

    // OperatorSheduler.php

    public function getIncomingAttribute($value)
    {
        return $value ? 'Да' : 'Нет';
    }

    public function getOutgoingAttribute($value)
    {
        return $value ? 'Да' : 'Нет';
    }

}
