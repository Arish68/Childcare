<?php

namespace App\Http\Controllers\ApiControllers\Notifications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Requestnotification;
use App\Models\Customer;
use App\Models\Comment;
use App\Models\ApprovedRejectNotification;
use App\Models\AddartworkNotifications;
use App\Models\AddMeetupNotifications;
use App\Models\AdminMeetupCommentNotification;
use App\Models\Meeting;
use App\Models\Meeting_User;
use App\Traits\ResponseTrait;
use App\Http\Resources\RequestNotificationCollection;
use App\Http\Resources\AddedArtWorkNotificationCollection;
use App\Http\Resources\AddedMeetupNotificationCollection;
use App\Http\Resources\AddedMeetupCommentNotificationCollection;

class GetRequestNotification extends Controller
{

    function __construct()
    {
        $this->premium = 1;
    }
    public function index($id){

    	 $data=Requestnotification::where('teacher_id',$id)->get();
    	 if ($data->isNotEmpty()) {    		
     		return RequestNotificationCollection::collection($data);
     	}
     	return $this->reponseMessage('Notification not found','error');

    }

    public function statusNotificaion($id){

    	 $data=ApprovedRejectNotification::where('teacher_id',$id)->get();
    	 if ($data->isNotEmpty()) {    		
     		return RequestNotificationCollection::collection($data);
     	}
     	return $this->reponseMessage('Notification not found','error');

    }
    
      public function changeRequestNotification($id){
        
        $data=Requestnotification::where('id',$id)->update(['status'=>'read']);
    	 if ($data) {    
    	     
     	return response(['message'=>'Notification status changed','status'=>'success']);
     	}
     	return response(['message'=>'Notification status not changed','status'=>'success']);
    }
    
    
     public function approveRejectNotification($id){
        
        $data=ApprovedRejectNotification::where('id',$id)->update(['status'=>'read']);
    	 if ($data) {    
    	     
     	return response(['message'=>'Notification status changed','status'=>'success']);
     	}
     	return response(['message'=>'Notification status not changed','status'=>'success']);
    }

    //ALL BILAL's Notifications
    //Parant will get Ne addded notification

    public function getParantAddedArtWorkNotification($id)
    {
        
        //dd($id);
        $data=AddartworkNotifications::where('parant_id',$id)->get();
         if ($data->isNotEmpty()) {         
            return AddedArtWorkNotificationCollection::collection($data);
        }
        return $this->reponseMessage('Notification not found','error');

    
    }

    public function getAddedMeetupNotification()
    {

        
       $premium = Customer::where('premium',$this->premium)->get();
       
       // print_r($premium); exit;
        if ($premium->isNotEmpty()) {
       // echo 'just check'; exit;
        
        // $data=AddMeetupNotifications::where('parant_id',$id)->get();
        $data=AddMeetupNotifications::all();
         if ($data->isNotEmpty()) {         
            return AddedMeetupNotificationCollection::collection($data);
        }
        return $this->reponseMessage('Notification not found','error');

      }

           return response(['message'=>'No Premium Costumer','status'=>'failed']);

    

    
    }

    public function getAddedMeetupCommentNotification($id)
    {



        //dd($id);        
       $comment = Comment::where('id',$id)->first();
       if ($comment) {
           # code...
       
       $meeting_id =$comment->meeting_id; 
       $meeting = Meeting_User::where('meeting_id',$meeting_id)->first();
        
       
       // print_r($premium); exit;
        if ($meeting) {
       //echo 'just check'; exit;
        
        // $data=AddMeetupNotifications::where('parant_id',$id)->get();
        $data=AdminMeetupCommentNotification::all();
         if ($data->isNotEmpty()) {         
            return AddedMeetupCommentNotificationCollection::collection($data);
        }
        return $this->reponseMessage('Notification not found','error');

      }

           return response(['message'=>'No Members exist','status'=>'failed']);

    }

      return response(['message'=>'No Meeting exist','status'=>'failed']);

    
    
        
    }

    public function changeStatusOfgetParantAddedArtWorkNotification($id)
    {
        
        
        $data=AddartworkNotifications::where('id',$id)->update(['status'=>1]);
         if ($data) {    
             
        return response(['message'=>'Notification status changed','status'=>'success']);
        }
        return response(['message'=>'Notification status not changed','status'=>'failed']);
    
    }
    
}
