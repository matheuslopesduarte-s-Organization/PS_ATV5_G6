<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Events\LoanCreatedEvent;
use App\Listeners\SendLoanCreatedNotification;

class EventServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->app['events']->listen(
            LoanCreatedEvent::class,
            SendLoanCreatedNotification::class
        );
    }
}
