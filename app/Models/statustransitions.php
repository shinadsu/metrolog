<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class statustransitions extends Model
{
    use HasFactory;

    protected $fillable = ['base_status_id', 'new_status_id', 'role_id', 'own_requests_allowed', 'others_requests_allowed'];


    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function status()
    {
        return $this->belongsTo(Statuses::class, 'status_id');
    }
}
