<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AnswerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'answer_id' =>$this->id,
            'answer_question_id' =>$this->question_id,
            'answer_body' =>$this->body,
            'answer_condition' =>$this->condition
        ];
    }
}
