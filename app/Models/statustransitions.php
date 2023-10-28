<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class statustransitions extends Model
{
    use HasFactory;

    protected $fillable = ['base_status_id', 'new_status_id', 'user_group_id', 'own_requests_allowed', 'others_requests_allowed'];
}
