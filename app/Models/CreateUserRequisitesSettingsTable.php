<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreateUserRequisitesSettingsTable extends Model
{
    use HasFactory;

    protected $table = 'user_requisites_settings';

    protected $fillable = ['role_id', 'propses_id', 'status_id', 'access_type', 'own_requests_allowed', 'others_requests_allowed', 'setting_enabled'];

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function prop()
    {
        return $this->belongsTo(Prop::class, 'propses_id');
    }

    public function status()
    {
        return $this->belongsTo(Statuses::class, 'status_id');
    }
}
