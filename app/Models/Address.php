<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'address', 
        'addressesArea', 
        'addressCity', 
        'addressSettlement', 
        'addressPlanningStructure', 
        'addressStreet', 
        'addressHouse', 
        'addressApartment',
        'full_address',
        'combined_address',
        'object_guid', // добавляем комбинированное поле
    ];

    // Мутатор для объединения адресных данных в JSON
    public function setCombinedAddressAttribute($value)
    {
        // Формируем массив из значений атрибутов
        $combinedData = [
            'address' => $this->attributes['address'] ?? null,
            'addressesArea' => $this->attributes['addressesArea'] ?? null,
            'addressCity' => $this->attributes['addressCity'] ?? null,
            'addressSettlement' => $this->attributes['addressSettlement'] ?? null,
            'addressPlanningStructure' => $this->attributes['addressPlanningStructure'] ?? null,
            'addressStreet' => $this->attributes['addressStreet'] ?? null,
            'addressHouse' => $this->attributes['addressHouse'] ?? null,
            'addressApartment' => $this->attributes['addressApartment'] ?? null,
        ];

        // Убираем пустые значения
        $filteredData = array_filter($combinedData, function ($item) {
            return $item !== null;
        });

        // Преобразование в строку JSON с убранными пробелами и новыми строками
        $this->attributes['combined_address'] = json_encode($filteredData, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }

    // Метод для регистрации события создания модели
    protected static function boot()
    {
        parent::boot();

        // Регистрация обработчика события создания модели
        static::created(function ($model) {
            $model->update(['combined_address' => $model->getAttributes()]);
        });
    }

    // Метод для получения адресных данных из JSON
    public function getCombinedAddressAttribute($value)
    {
        return json_decode($value, true);
    }

    public function applications()
    {
        return $this->belongsToMany(Application::class, 'address_applications', 'address_id', 'application_id');
    }

}

