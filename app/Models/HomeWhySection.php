<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeWhySection extends Model
{
    protected $table = 'home_why_sections';

    protected $fillable = [
        'is_active',
        'subtitle',

        'b1_title','b1_desc',
        'b2_title','b2_desc',
        'b3_title','b3_desc',
        'b4_title','b4_desc',

        'c1','c2','c3','c4','c5',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}