<?php

namespace App\Listeners\Booking;

use App\Events\BookingEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class EmailManagerListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\BookingEvent  $event
     * @return void
     */
    public function handle(BookingEvent $event)
    {
        //
    }
}
