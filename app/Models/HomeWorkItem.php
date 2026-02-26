<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeWorkItem extends Model
{
    protected $table = 'home_work_items';

    protected $fillable = [
        'sort_order',
        'is_active',
        'tag',
        'title',
        'description',
        'icon_path',
        'meta1',
        'meta2',
        'meta3',
    ];

    protected $casts = [
        'sort_order' => 'integer',
        'is_active'  => 'boolean',
    ];
}