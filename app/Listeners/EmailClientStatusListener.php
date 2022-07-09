<?php

namespace App\Listeners;

use App\Models\User;
use App\Notifications\Booking\EmailClientStatusNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class EmailClientStatusListener
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
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $booking = $event->booking;
        $user = $event->booking->user;
        $manager = $event->booking->apartment->manager;

        $data = [
            'id' => $booking->id,
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'updated_at' => $booking->updated_at,
            'manager' => [
                'first_name' => $manager->first_name,
                'last_name' => $manager->last_name,
                'email' => $manager->email,
                'phone' => $manager->phone,
            ]
        ];

        if ($booking->status == 0) {
            $user->notify(new EmailClientStatusNotification($data));
        }
    }
}
