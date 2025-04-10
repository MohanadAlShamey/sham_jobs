<?php

namespace App\Exports;

use App\Models\Group;
use App\Models\Job;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class GroupExport implements FromView
{
public $id;
public function __construct($id)
{
    $this->id=$id;
}

    public function view(): View
    {
        return view('group-excel', [
            'job' => Job::find($this->id),
        ]);
    }
}
