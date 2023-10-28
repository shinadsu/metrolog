<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreateUserRequisitesSettingsTable extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'propses_id', 'status_id', 'access_type', 'setting_enabled'];
}
