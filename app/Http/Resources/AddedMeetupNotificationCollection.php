<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AddedMeetupNotificationCollection extends JsonResource
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
            'meetup_Title' => $this->meetup_title,
            'created_at' => createdAtDateFormate($this->created_at),
            'meetup_detail' => route('meeting-detail',$this->meetup_id)
        ];
    }
}
