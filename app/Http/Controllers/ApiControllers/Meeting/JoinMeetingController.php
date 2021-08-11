<?php

namespace App\Http\Controllers\ApiControllers\Meeting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Meeting\JoinMeetingRequest;
use App\Traits\ResponseTrait;
use App\Models\Meeting_User;

class JoinMeetingController extends Controller
{
	use ResponseTrait;

    public function joinMeeting(JoinMeetingRequest $request){
    	 $data=$request->validated();
    	 $checkAlreadyJoined=Meeting_User::where('customer_id',$data['customer_id'])
    	                     ->where('meeting_id',$data['meeting_id'])->exists();
    	 if (!$checkAlreadyJoined) {
    	    $result=Meeting_User::create($data);
    	 if ($result) {
    	 	return $this->reponseMessage('Meeting Joined Successfully','success');
    	 }
    	    return $this->reponseMessage('Meeting Not Joined.','error');               	
    	 }
    	    return $this->reponseMessage('You Already Joined.','error');                     
    	 
    }
}
