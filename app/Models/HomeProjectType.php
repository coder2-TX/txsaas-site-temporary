<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeProjectType extends Model
{
    protected $table = 'home_project_types';

    protected $fillable = [
        'sort_order',
        'is_active',
        'value',
        'label',
    ];

    protected $casts = [
        'sort_order' => 'integer',
        'is_active'  => 'boolean',
    ];
}