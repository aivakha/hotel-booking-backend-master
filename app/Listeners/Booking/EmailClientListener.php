<?php

namespace App\Listeners\Booking;

use App\Events\Booking\BookingEvent;
use App\Models\User;
use App\Notifications\Booking\EmailClientNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class EmailClientListener
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
        $user_id = $event->booking->user_id;
        $user = User::find($user_id);

        if ($user) {

            $booking_id = $event->booking->id;

            $check_in = $event->booking->check_in;
            $check_out = $event->booking->check_out;
            $days = $check_out->diffInDays($check_in);

            $room_title = $event->booking->room->title;
            $room_price = $event->booking->room->price;
            $total_price = $room_price * $days;

            $apartment_title = $event->booking->apartment->title;
            $apartment_address = $event->booking->apartment->address;

            $manager_first_name = $event->booking->apartment->manager->first_name;
            $manager_last_name = $event->booking->apartment->manager->last_name;
            $manager_email = $event->booking->apartment->manager->email;
            $manager_phone = $event->booking->apartment->manager->phone;

            $created_at = $event->booking->created_at;

            $data = [
                'id' => $booking_id,
                'check_in' => $check_in,
                'check_out' => $check_out,
                'room_title' => $room_title,
                'total_price' => $total_price,
                'created_at' => $created_at,
                'apartment' => [
                    'title' => $apartment_title,
                    'address' => $apartment_address,
                ],
                'manager' => [
                    'first_name' => $manager_first_name,
                    'last_name' => $manager_last_name,
                    'email' => $manager_email,
                    'phone' => $manager_phone,
                ],
            ];

            $user->notify(new EmailClientNotification($data));
        }
    }
}
