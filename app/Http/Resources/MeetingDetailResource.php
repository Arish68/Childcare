<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\MeetingCommentsCollection;
use App\Models\Meeting;
use App\Models\Meeting_User;
use App\Models\Comment;

class MeetingDetailResource extends JsonResource
{
    
    public function toArray($request)
    {
        $comments=Comment::meetingComments($this->id);
        $userid = Meeting_User::select('customer_id')->where('meeting_id',$this->id)->get();
        return [

            'id' => $this->id,
            'title' => $this->title,
            'meeting_date' => date('m-d-Y',strtotime($this->meeting_date)),
            'meeting_time' => date('h:i A',strtotime($this->meeting_time)),         
            'description' => $this->description,
            'address' => $this->address,
            'userids' => $userid,
            'image' =>asset('public/meetupImages/'.$this->image),
            'total_members' => strval(Meeting::getTotalMembers($this->id)), 
            'created_at' => createdAtDateFormate($this->created_at),
            'comments' => MeetingCommentsCollection::collection($comments),
            
        ];
    }
}
