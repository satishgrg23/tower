<?php

namespace App\Listeners;

use App\Events\NotificationSystem;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class Notify
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
     * @param  NotificationSystem  $event
     * @return void
     */
    public function handle(NotificationSystem $event)
    {
        //
        var_dump('The User '. $event->name.' has registered.');
    }
}
