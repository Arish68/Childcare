<?php

namespace App\Http\Controllers\ApiControllers\Meeting;
//namespace App\Http\Controllers\ApiControllers\Lesson;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Meeting;
use App\Traits\ResponseTrait;
use App\Http\Resources\AvailableMeetingResource;
use App\Http\Resources\MeetingDetailResource;
//use App\Models\Lesson;
//use App\Traits\ResponseTrait;
//use App\Http\Resources\LessonResource;

class AvailableMeetingController extends Controller
{
	 use ResponseTrait;

     public function allMeeting(){

     	$data=Meeting::all();
     	if ($data->isNotEmpty()) {    		
     		return AvailableMeetingResource::collection($data);
     	}
     	return $this->reponseMessage('Meetings not found','error');
     }

     public function meetingDetail($id){
     	
     	$data=Meeting::find($id);
     
          if ($data) {
               return new MeetingDetailResource($data);
          }
          return $this->reponseMessage('Meeting not found','error');
     }


     //ALl Lessons 

     
}
