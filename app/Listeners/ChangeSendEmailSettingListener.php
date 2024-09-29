<?php

namespace App\Listeners;

use App\Events\ChangeSendEmailSettingEvent;
use App\Models\Option;
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
        $setting=Option::first();

        try {
            $response = \Http::withQueryParameters([
                'job_id'=>$setting->work_id,
                'accepted_template'=>$setting->accepted_template,
                'is_send_accepted'=>$setting->send_accepted,
                'reject_template'=>$setting->reject_template,
                'is_send_rejected'=>$setting->send_rejected,
                'footer'=>$setting->footer_template,
                'time_present'=>$setting->present_date,
            ])-> get("https://hook.eu2.make.com/ee6rafepr6pv88j3r8hbojz8mhguqgjh");
            if($response->successful()){
                \Log::info("Success Filtering : {$response->body()}");
            }
        } catch (\Exception $e) {
            \Log::error("Error Filter : {$e->getMessage()}");
        }
    }
}
