<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PreferredChannelUser extends Model
{
    protected $fillable = [
        'preferred_channel_id',
        'user_id',
    ];
}
