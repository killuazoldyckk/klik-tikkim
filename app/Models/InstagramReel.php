<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InstagramReel extends Model
{
    protected $fillable = [
        'title',
        'description',
        'instagram_url',
        'is_active',
        'is_verified',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'is_verified' => 'boolean',
            'sort_order' => 'integer',
        ];
    }
}
