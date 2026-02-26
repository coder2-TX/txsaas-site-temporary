<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeProcessSection extends Model
{
    protected $table = 'home_process_sections';

    protected $fillable = [
        'is_active',
        'subtitle',

        's1_title','s1_desc',
        's2_title','s2_desc',
        's3_title','s3_desc',
        's4_title','s4_desc',
        's5_title','s5_desc',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}