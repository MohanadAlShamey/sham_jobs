<?php

namespace App\Listeners;

use App\Events\ChangeFilterSettingEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ChangeFilterSettingListener
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
    public function handle(ChangeFilterSettingEvent $event): void
    {
        info('LISTEN EVENT');
    }
}
