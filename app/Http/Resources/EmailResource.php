<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EmailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'job_id'=>$this->work_id,
            'accepted_template'=>$this->accepted_template,
            'is_send_accepted'=>$this->send_accepted,
            'reject_template'=>$this->reject_template,
            'is_send_rejected'=>$this->send_rejected,
        ];
    }
}
