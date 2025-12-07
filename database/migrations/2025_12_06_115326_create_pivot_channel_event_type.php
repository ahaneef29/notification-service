<?php

use App\Models\EventType;
use App\Models\PreferredChannelUser;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('channel_event_type', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(PreferredChannelUser::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(EventType::class)->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('channel_event_type');
    }
};
