<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeContactSetting extends Model
{
    protected $table = 'home_contact_settings';

    protected $fillable = [
        'is_active',
        'email',
        'whatsapp',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}