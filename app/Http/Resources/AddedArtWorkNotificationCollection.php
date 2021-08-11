<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AddedArtWorkNotificationCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [

            'id' => $this->id,
            'message' => $this->message,
            //'status' => $this->status,
            'created_at' => createdAtDateFormate($this->created_at),
            'art_detail' => route('lesson-artwork-detail',$this->art_id)
        ];
    }
}
