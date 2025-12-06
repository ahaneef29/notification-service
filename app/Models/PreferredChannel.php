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

    public function users(): HasMany
    {
        return $this->hasMany(PreferredChannelUser::class);
    }
}
