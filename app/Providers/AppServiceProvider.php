<?php

namespace App\Providers;

use App\Interfaces\SMSInterface;
use App\Notifications\Channels\SMSChannel;
use App\Services\SMSService;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Notification::extend('sms', function ($app) {
            return new SMSChannel($app->make(SMSService::class));
        });

        $this->app->bind(SMSInterface::class, function () {
            return new SMSService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
