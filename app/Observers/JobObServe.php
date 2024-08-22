<?php

namespace App\Observers;

use App\Models\Ask;
use App\Models\Job;

class JobObServe
{
    /**
     * Handle the Job "created" event.
     */
    public function created(Job $job): void
    {
        $asks = Ask::whereNull('job_id')->get();
        foreach ($asks as $ask) {
            Ask::create([
                'job_id' => $job->id,
                'title' => $ask->title,
                'required' => $ask->required,
                'options' => $ask->options,
                'type' => $ask->type,
            ]);
        }
    }

    /**
     * Handle the Job "updated" event.
     */
    public function updated(Job $job): void
    {
        //
    }

    /**
     * Handle the Job "deleted" event.
     */
    public function deleted(Job $job): void
    {
        //
    }

    /**
     * Handle the Job "restored" event.
     */
    public function restored(Job $job): void
    {
        //
    }

    /**
     * Handle the Job "force deleted" event.
     */
    public function forceDeleted(Job $job): void
    {
        //
    }
}
