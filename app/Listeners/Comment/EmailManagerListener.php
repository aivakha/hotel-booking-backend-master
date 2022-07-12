<?php

namespace App\Listeners\Comment;

use App\Events\Comment\CommentEvent;
use App\Models\Apartment;
use App\Notifications\Comment\EmailManagerNotification;
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

    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\Comment\CommentEvent $event
     * @return void
     */

    public function handle(CommentEvent $event)
    {
        $apartment = Apartment::find($event->comment->apartment_id);
        $manager = $apartment->manager;

        if ($manager) {
            $data = [
                'id' => $manager->id,
                'apartment' => $apartment->title,
                'first_name' => $manager->first_name,
                'last_name' => $manager->last_name,
            ];

            $manager->notify(new EmailManagerNotification($data));
        }


    }
}
