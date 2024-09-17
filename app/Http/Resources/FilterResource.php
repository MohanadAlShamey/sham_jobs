<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FilterResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'job_id'=>$this->job_id,
            'job_name'=>$this->job?->name,
            'employee_count'=>$this->employee_count,
            'criteria'=>$this->criteria,
        ];
    }
}
