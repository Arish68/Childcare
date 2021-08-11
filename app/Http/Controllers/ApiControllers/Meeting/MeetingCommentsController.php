<?php

namespace App\Http\Controllers\ApiControllers\Meeting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Meeting\MeetingCommentRequest;
use App\Traits\ResponseTrait;
use App\Models\Comment;
use App\Models\Customer;
use App\Models\Meeting;
use App\Models\MeetingNotification;
use App\Models\Meeting_User;
use DB;
class MeetingCommentsController extends Controller
{
    use ResponseTrait;

    public function postComment(MeetingCommentRequest $request){
            $cutomerid = $request->current_id;
            $meetingid =  $request->meeting_id;
            $message =  $request->message;
        
    	    $data=$request->validated();	 
    	    $result=Comment::create($data);
	    	 if ($result) {
	    	     
	        $meeting_data = Meeting::where('id',$meetingid)->first();
	        $customer_data = Customer::where('id',$request->current_id)->first();
	        $customerdata =  $customer_data->firstname .' '. $customer_data->lastname ." Commented on ".$meeting_data->title;
	        
	        $img_path =  asset('/public/meetupImages/');
              $notifydata=DB::table('meetings as m')
             ->select(['m.id as id', DB::raw('concat( "'.$img_path .'/",m.image) AS meeting_image'),DB::raw('DATE_FORMAT(m.created_at, "%d %b-%Y") as created_at')])
             ->where('m.id', $meetingid)
             ->get()->first();
	        
	        
	        $firebaseToken = Meeting_User::from('meeting_users as mc')
            ->join('customers as cu', 'mc.customer_id', 'cu.id')
            ->where('mc.customer_id','!=',$cutomerid)
            ->where('mc.meeting_id',$meetingid)
            ->pluck('device_token')->all();
      
 
               
      
                $SERVER_API_KEY = env('FIRE_BASE_SERVER_API_KEY');
          
                $data2 = [
                    "registration_ids" => $firebaseToken,
                    "notification" => [
                        "title" => $customerdata,
                        "body" => "unread",  
                    ],
                     "data"=> ['datauser'=>$notifydata,'datacustomer'=>$customer_data->type,'type'=>'meeting']
                ];
                $dataString = json_encode($data2);
            
                $headers = [
                    'Authorization: key=' . $SERVER_API_KEY,
                    'Content-Type: application/json',
                ];
            
                $ch = curl_init();
              
                curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
                $response = curl_exec($ch);
            //$res = json_decode($response);
            //      return response([
            //       'message'=>'Comment Posted Successfully.',
            //       'status' =>'success',
            //       'data' => $res
            //   ]);
              $allcustids = Meeting_User::from('meeting_users as mc')
            ->join('customers as cu', 'mc.customer_id', 'cu.id')
            ->where('mc.customer_id','!=',$cutomerid)
            ->where('mc.meeting_id',$meetingid)
            ->get()->all();
              foreach( $allcustids  as $custid)
              {
                    $not = new MeetingNotification;
            		$not->meeting_id = $meetingid;
            		$not->commenter_id  = $cutomerid;
            		$not->customer_id = $custid->customer_id;
            		$not->message = $message;
            		$not->dataType = "meeting";
            		$not->status = 0;
            		$not->save();  
              }
           
	    	 	return $this->reponseMessage('Comment Posted Successfully.','success');
	    	 }
    	     return $this->reponseMessage('Comment Not Posted.','error');               	
    	                
    	 
    }
}
