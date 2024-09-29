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
        try {
            $response = \Http::get("https://hook.eu2.make.com/2kr49j66ts5wmh54lguhg1ch18g86iiz");
                if($response->successful()){
                    \Log::info("Success Filtering : {$response->body()}");
                }
        } catch (\Exception $e) {
            \Log::error("Error Filter : {$e->getMessage()}");
        }
    }
}
