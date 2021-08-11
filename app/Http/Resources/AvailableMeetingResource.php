<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Meeting;

class AvailableMeetingResource extends JsonResource
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

            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'image' => asset('public/meetupImages/'.$this->image),   
            'total_members' => strval(Meeting::getTotalMembers($this->id)),      
            'single_detail' => route('meeting-detail',$this->id)
            
        ];
    }
}
