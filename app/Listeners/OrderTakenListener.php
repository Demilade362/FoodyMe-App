<?php

namespace App\Listeners;

use App\Notifications\OrderTakenNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class OrderTakenListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        $event->user->notify(new OrderTakenNotification($event->user, $event->name, 'Your Order has been Taken,'));
    }
}
