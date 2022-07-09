<?php

namespace App\Providers;

use App\Events\BookingEvent;
use App\Listeners\Booking\EmailManagerListener;
use App\Listeners\EmailClientListener;
use App\Listeners\VerifiedEmailNotification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Events\Verified;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        Verified::class => [
            VerifiedEmailNotification::class
        ],

        BookingEvent::class => [
            // EmailManagerListener::class,
            EmailClientListener::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
