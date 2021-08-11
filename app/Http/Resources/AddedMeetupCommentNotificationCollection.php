<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AddedMeetupCommentNotificationCollection extends JsonResource
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
            'comment_detail' => route('comment-detail',$this->comment_id)
        ];
    }
}
