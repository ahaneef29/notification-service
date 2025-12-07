<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class PreferredChannelUser extends Model
{
    protected $fillable = [
        'preferred_channel_id',
        'user_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function preferredChannel(): BelongsTo
    {
        return $this->belongsTo(PreferredChannel::class);
    }

    public function eventTypes(): BelongsToMany
    {
        return $this->belongsToMany(EventType::class, 'channel_event_type',
            'preferred_channel_user_id',
            'event_type_id');
    }
}
