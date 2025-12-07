<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PreferredChannel extends Model
{
    protected $fillable = [
        'name',
        'channel_name',
    ];

    public function preferredChannelUsers(): HasMany
    {
        return $this->hasMany(PreferredChannelUser::class);
    }

    public function eventTypes(): BelongsToMany
    {
        return $this->belongsToMany(EventType::class, 'channel_event_type',
            'event_type_id',
            'preferred_channel_user_id');
    }
}
