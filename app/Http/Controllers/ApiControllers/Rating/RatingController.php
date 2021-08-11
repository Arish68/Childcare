<?php

namespace App\Http\Controllers\ApiControllers\Rating;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rating;
use App\Models\Rate;
use App\Models\Customer;
use App\Models\ParentNotification;
use App\Models\RateNotification;
use App\Traits\ResponseTrait;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\RatingCollection;
use DB;

class RatingController extends Controller
{
	 use ResponseTrait;

     public function rating(Request $request){
            
           // print_r($request->all()); exit;
            $check=Rating::where('customer_id',$request->customer_id)
          //  ->where('type',0)
            ->where('request_id',$request->request_id)->exists();
            if ($check) {
            	return $this->reponseMessage('Request Already Saved','error');
            }
            		$rating=Rating::create($request->all());
		
//Firebase Start here
        $firebaseToken = Customer::where('id',$request->teacher_id)->pluck('device_token');
        $parent_data = Customer::where('id',$request->customer_id)->first();
        $parentdata ="Completed your request ". $parent_data->firstname .' '.$parent_data->lastname ;
        
         $img_path =  asset('/public/userImages/');
         $notifydata=DB::table('customers as c')
         ->select(['c.id as user_id','c.type as user_type', DB::raw('concat( "'.$img_path .'/",c.image) AS user_image'), 'ur.*',DB::raw('DATE_FORMAT(ur.created_at, "%d %b-%Y") as created_at')])
         ->join('user_requests as ur', 'c.id', '=', 'ur.customer_id')
         ->where('ur.id', $request->request_id)
         ->get()->first();
      
        $API_KEY = env('FIRE_BASE_SERVER_API_KEY');
        $SERVER_API_KEY = $API_KEY;
         
        $data2 = [
            "registration_ids" => $firebaseToken,
            "notification" => [
                "title" => $parentdata,
                "body" => "unread",
            ],
            "data"=> ['datauser'=>$notifydata,'datacustomer'=>$notifydata->user_type,'type'=>'Rated']
            
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
        //make new table notification parent_notification  list parent ko show (teacher-image, teacher-name , message="Appliend on your request" , request-detail=table-row ,status=1 )
        // Firebase Notification End Here
        $not = new RateNotification;
		$not->teacher_id = $request->teacher_id;
		$not->parent_id  = $request->customer_id;
		$not->viewer_id = $request->teacher_id;
		$not->request_id = $request->request_id;
		$not->dataType = "Rated";
		$not->status = 0;
		$not->save();

//Firebase End Here

    		    	if ($rating) {
           	   
           	           return $this->reponseMessage('Request Saved','success');
                     }

           	          return $this->reponseMessage('Request Not Saved','error');
         	
        }

    public function getRating($request_id)
    {
      //echo 'just check'; exit;
      //echo $request_id; exit;
         $rating=Rating::from('ratings as r')
                       ->join('customers as c','c.id','=','r.customer_id')
                     //  ->join('applied_requests as ar','ar.request_id','=','r.request_id')
                       ->select('c.*','r.*')
                      ->where('r.request_id',$request_id)
                      ->where('c.type',1)
                      // ->where('ar.status', 'accepted')
                       ->get();
                      // DB::enableQueryLog();
                     //  dd(DB::getQueryLog()); exit;
        if ($rating->count() > 0) {

            return  RatingCollection::collection($rating);

        }
        return $this->reponseMessage('Request Not Found','error');
    }  
    
    
    
       public function getRating_rate($request_id)
    {
      //echo 'just check'; exit;
      //echo $request_id; exit;
         $rating=Rate::from('rates as r')
                       ->join('customers as c','c.id','=','r.teacher_id')
                     //  ->join('applied_requests as ar','ar.request_id','=','r.request_id')
                       ->select('c.*','r.*')
                      ->where('r.request_id',$request_id)
                      ->where('c.type',0)
                      // ->where('ar.status', 'accepted')
                       ->get();
                      // DB::enableQueryLog();
                     //  dd(DB::getQueryLog()); exit;
        if ($rating->count() > 0) {

            return  RatingCollection::collection($rating);

        }
        return $this->reponseMessage('Request Not Found','error');
    } 
    
     public function getTeacherRating($teacher_id,$type)
    {
      //echo 'just check'; exit;
      //echo $request_id; exit; // type = "teacher" , "parent"
      if($type == 'teacher')
      {
         $rating = Rating::from('ratings as r')
                       ->join('customers as c','c.id','=','r.customer_id')
                       ->select('c.*','r.*')
                      ->where('r.teacher_id',$teacher_id)
                      ->where('c.type',1)
                      // ->where('ar.status', 'accepted')
                       ->get();
      }
      
      else
      {
         $rating = Rate::from('rates as r')
                       ->join('customers as c','c.id','=','r.teacher_id')
                       ->select('c.*','r.*')
                       ->where('r.parent_id',$teacher_id)
                       ->where('c.type',0)
                       ->get();
      }
        if ($rating->count() > 0) {

            return  RatingCollection::collection($rating);

        }
        return $this->reponseMessage('Request Not Found','error');
    }  
    
    
    public function rate(Request $request)
    {
        $input= $request->all();
        $validator = Validator::make($input,[
            'teacher_id' => 'required',
            'parent_id' => 'required',
            'stars'=>'required|min:0|max:5',
        ]);

        if($validator->fails())
        {
            return response()->json(['error' => $validator->errors()], 401);
        }
        $record = Rate::where([
            ['teacher_id', $request->teacher_id],
            ['parent_id', $request->parent_id],
              ['request_id', $request->request_id],
        ]);

        //If our record doesn't exist we create it
        if (null === $record->first()) {
            $rate = new Rate();
            $rate->teacher_id =  $request->teacher_id;
            $rate->request_id =  $request->request_id;
            $rate->parent_id = $request->parent_id;
            $rate->stars = $request->stars;
            $rate->reviews = $request->reviews;
            $rate->save();
            
            
//Firebase Start here
        $firebaseToken = Customer::where('id',$request->parent_id)->pluck('device_token');
        $teacher_data = Customer::where('id',$request->teacher_id)->first();
        $teacherdata = $teacher_data->firstname .' '.$teacher_data->lastname ." rated your profile";
        
         $img_path =  asset('/public/userImages/');
         $notifydata=DB::table('customers as c')
         ->select(['c.id as user_id','c.type as user_type', DB::raw('concat( "'.$img_path .'/",c.image) AS user_image'), 'ur.*',DB::raw('DATE_FORMAT(ur.created_at, "%d %b-%Y") as created_at')])
         ->join('user_requests as ur', 'c.id', '=', 'ur.customer_id')
         ->where('ur.id', $request->request_id)
         ->get()->first();
      
        $API_KEY = env('FIRE_BASE_SERVER_API_KEY');
        $SERVER_API_KEY = $API_KEY;
         
        $data2 = [
            "registration_ids" => $firebaseToken,
            "notification" => [
                "title" => $teacherdata,
                "body" => "unread",
            ],
            "data"=> ['datauser'=>$notifydata,'datacustomer'=>$notifydata->user_type,'type'=>'Rated']
            
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
        //make new table notification parent_notification  list parent ko show (teacher-image, teacher-name , message="Appliend on your request" , request-detail=table-row ,status=1 )
        // Firebase Notification End Here
        $not = new RateNotification;
		$not->teacher_id = $request->teacher_id;
		$not->parent_id  = $request->parent_id;
		$not->request_id = $request->request_id;
		$not->viewer_id = $request->parent_id;
		$not->dataType = "Rated";
		$not->status = 0;
		$not->save();

//Firebase End Here
            return response()->json([
                'message' => "You Rate Successfully",
                'rate_status'=> true,
                'status' => 'success'],200);

        } else {
           
            return response()->json([
                'message' => "You already rate this parent",
                'rate_status'=> false,
                'status' => 'success'],200);
        }

    }
    
    

    
    
    
    
}
