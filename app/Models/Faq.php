<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Faq extends Model
{
    protected $fillable = [
        'service_id',
        'question',
        'answer',
        'sort_order',
        'publication_status',
        'is_verified',
        'verified_at',
        'verified_by_name',
    ];

    protected function casts(): array
    {
        return [
            'is_verified' => 'boolean',
            'verified_at' => 'datetime',
            'sort_order' => 'integer',
        ];
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(
            \App\Models\User::class,
            'created_by_user_id'
        );
    }
}