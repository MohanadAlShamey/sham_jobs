<?php

namespace App\Observers;

use App\Enums\JobTypeEnum;
use App\Models\Ask;
use App\Models\Job;

class JobObServe
{
    /**
     * Handle the Job "created" event.
     */
    public function created(Job $job): void
    {
        $asks = Ask::whereNull('job_id')->where(fn($query) => $query->where('job_type', JobTypeEnum::BOTH->value)->orWhere('job_type', $job->type))->get();
        foreach ($asks as $ask) {
            Ask::create([
                'job_id' => $job->id,
                'title' => $ask->title,
                'required' => $ask->required,
                'options' => $ask->options,
                'type' => $ask->type,
                'job_type' => $job->type,
                'active' => $ask->active
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
