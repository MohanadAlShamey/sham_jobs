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
            "fixed_ask"=>[
                [
                    'ask'=>'الاسم الأول',
                    'answer'=>$this->first_name
                ],
                [
                    'ask'=>'اسم الاب',
                    'answer'=>$this->father_name
                ],
                [
                    'ask'=>'الكنية',
                    'answer'=>$this->last_name
                ],

                [
                    'ask'=>'المسمى الوظيفي',
                    'answer'=>$this->job_name
                ],

                [
                    'ask'=>'البريد الإلكتروني',
                    'answer'=>$this->email
                ],
                [
                    'ask'=>'تاريخ الميلاد',
                    'answer'=>$this->birth_date
                ],



            ],
            'answers'=>AnswersResource::collection($this->answers),
        ];
    }
}
