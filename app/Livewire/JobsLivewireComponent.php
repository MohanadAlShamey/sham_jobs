<?php

namespace App\Livewire;

use App\Models\Job;
use Livewire\Component;

class JobsLivewireComponent extends Component
{
    public function render()
    {
        return view('livewire.jobs-livewire-component',[
            'jobs'=>Job::where('active',1)->where('end_date','>=',now()->startOfDay())->latest()->get(),
        ]);
    }
}
