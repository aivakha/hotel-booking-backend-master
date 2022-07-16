<?php

namespace App\Listeners\Booking;

use App\Events\Booking\BookingEvent;
use App\Models\User;
use App\Notifications\Booking\EmailManagerNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Carbon;

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
     * @param  \App\Events\Booking\BookingEvent  $event
     * @return void
     */
    public function handle(BookingEvent $event)
    {
        $manager = $event->booking->apartment->manager;
        $booking_id = $event->booking->id;

        $user = User::find($event->booking->user_id);

        if ($user) {
            $user_first_name = $user->first_name;
            $user_last_name = $user->last_name;
            $user_phone = $user->phone;
            $user_email = $user->email;

            $days = Carbon::parse($event->booking->check_out)->diffInDays(Carbon::parse($event->booking->check_in));

            $room_title = $event->booking->room->title;
            $room_price = $event->booking->room->price;
            $total_price = $room_price * $days;

            $apartment_title = $event->booking->apartment->title;
            $apartment_address = $event->booking->apartment->address;

            $created_at = $event->booking->created_at;

            $data = [
                'id' => $booking_id,
                'check_in' => Carbon::parse($event->booking->check_in),
                'check_out' => Carbon::parse($event->booking->check_out),
                'room_title' => $room_title,
                'total_price' => $total_price,
                'created_at' => $created_at,
                'apartment' => [
                    'title' => $apartment_title,
                    'address' => $apartment_address,
                ],
                'user' => [
                    'first_name' => $user_first_name,
                    'last_name' => $user_last_name,
                    'email' => $user_email,
                    'phone' => $user_phone,
                ],
            ];

            $manager->notify(new EmailManagerNotification($data));
        }
    }
}
