<?php

namespace App\Listeners;

use App\Events\NewMessageAdded;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateChat
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
     * @param  \App\Events\NewMessageAdded  $event
     * @return void
     */
    public function handle(NewMessageAdded $event)
    {
        dd($event);
    }
}
