<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GroupResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'email'=>$this->email,
            'id'=>$this->id,
            'full_name'=> $this->first_name.' '. $this->father_name.' '.$this->last_name,
            'area'=>$this->area,
            'address'=>$this->address,
            'cv'=>$this->cv,
            'certificate'=>$this->certificate,
            'answers'=>AnswersResource::collection($this->answers),
        ];
    }
}
