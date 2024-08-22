<?php

namespace App\Livewire;

use App\Models\Job;
use Livewire\Component;

class PresentComponent extends Component
{
    public $job;

    public function mount(Job $job)
    {
        $this->job = $job;
    }

    public function render()
    {
        return view('livewire.present-component',[
            'asks'=>$this->job->asks()->where('active',true)->orderBy('sort')->get(),
        ]);
    }
}
