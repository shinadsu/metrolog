<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles'; // Название таблицы в базе данных
    
    public $timestamps = false; // Отключаем метки времени для этой модели

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
