<?php

namespace App\Listeners;

use App\Events\ChangeSendEmailSettingEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ChangeSendEmailSettingListener
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
    public function handle(ChangeSendEmailSettingEvent $event): void
    {
        \Log::error("SEND EMAIL");
    }
}
