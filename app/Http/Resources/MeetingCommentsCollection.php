<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\jsonResource;

class MeetingCommentsCollection extends jsonResource
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
            'name' => is_null($this->admin_name) ? $this->firstname.' '.$this->lastname : $this->admin_name,
            'type' => is_null($this->admin_name) ? 'User' : 'Admin',
            'image' => is_null($this->image) ? '0' : asset('public/userImages/'.$this->image),
            'comment' => $this->message,
            'time'=>createdAtDateFormate($this->created_at),
        ];
    }
}
