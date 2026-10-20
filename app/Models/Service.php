<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Service extends Model
{
    protected $fillable = [
        'service_category_id',
        'title',
        'slug',
        'summary',
        'content',
        'official_url',
        'publication_status',
        'is_verified',
        'verified_at',
        'verified_by_name',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'is_verified' => 'boolean',
            'verified_at' => 'datetime',
            'sort_order' => 'integer',
        ];
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(
            ServiceCategory::class,
            'service_category_id'
        );
    }

    public function faqs(): HasMany
    {
        return $this->hasMany(Faq::class);
    }

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(
            \App\Models\User::class,
            'created_by_user_id'
        );
    }
}