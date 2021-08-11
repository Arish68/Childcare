<?php

namespace App\Http\Controllers\ApiControllers\Request;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Request\CreateRequest;
use App\Models\UserRequest;
use App\Models\Customer;
use App\Models\ParentNotification;
use App\Models\ApprovedRejectNotification;

use App\Models\Requestnotification;
use App\Traits\ResponseTrait;
use App\Http\Resources\UserRequestsResource;
use App\Http\Resources\RequestDetail;
use App\Http\Resources\ParentRequestsResourceCollection;
use App\Http\Resources\AppliedRequestCollection;
use App\Models\Appliedrequest;
use App\Models\ParentChildRequest;
use DB;
class UserRequestController extends Controller
{
    use ResponseTrait;

    public function createRequest(CreateRequest $request)
    {

        $data = $request->validated();
        $result = new UserRequest();
                $result->customer_id = $request->customer_id;
                $result->from = $request->from;
                $result->to   = $request->to;
                $result->address   = $request->address;
                $result->service   = $request->service;
                $result->save();
       // $result = UserRequest::create($data);
       $childlist =$request->childlist;
         
        if ($result) {
            
          foreach ($childlist as  $value) {
                $pc = new ParentChildRequest();
                $pc->parent_id = $request->customer_id;
                $pc->request_id = $result->id;
                $pc->child_id   = $value;
                $pc->save();
          }
          
            $teachers = Customer::where('type', 0)->get(['id']);
            
            foreach ($teachers as $key => $value) {
                $re = new Requestnotification();
                $re->teacher_id = $value->id;
                $re->save();
                
            }
            return $this->reponseMessage('Request created successfully', 'success');
        }
        return $this->reponseMessage('Request not created', 'error');
    }

    public function apply(Request $request)
    {
        $input = $request->all();
           $img_path =  asset('/public/userImages/');
        $data = $this->validate($request, [
            'teacher_id' => 'required',
            'request_id' => 'required',
        ]);

        $check = Appliedrequest::where('teacher_id', $request->teacher_id)->where('request_id', $request->request_id)->exists();
        if ($check) {
            return $this->reponseMessage('Request alerady applied','error');
        }
        
        
        // Firebase Notification Start Here
        
        $firebaseToken = Customer::where('id',$request->parent_id)->pluck('device_token');
        $teacher_data = Customer::where('id',$request->teacher_id)->first();
        $teacherdata = $teacher_data->firstname .' '.$teacher_data->lastname ." Applied on your request";
        
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
            "data"=> ['datauser'=>$notifydata,'datacustomer'=>$notifydata->user_type,'type'=>'request']
            
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
        $not = new ParentNotification;
		$not->teacher_id = $request->teacher_id;
		$not->parent_id  = $request->parent_id;
		$not->request_id = $request->request_id;
		$not->dataType = "ApplyRequest";
		$not->status = 0;
		$not->save();
         
        $result = Appliedrequest::create($input);
        if ($result) {
            return $this->reponseMessage('Request applied successfully', 'success');
        }
        return $this->reponseMessage('Request not applied','error');
    }

    public function changeStatus($id, $request_id, $parent_id, $status)
    {

        if (!$data = Appliedrequest::where('teacher_id', $id)->where('request_id', $request_id)->first()) {
            return $this->reponseMessage('Record Not Found', 'Failure');
        }
        $data = Appliedrequest::where('teacher_id', $id)->where('request_id', $request_id)->update([
            'parent_id' => $parent_id,
            'status' => $status,
        ]);

        if ($data) {

            $teacher_id = Appliedrequest::where('teacher_id', $id)->first();
            UserRequest::where('id', $request_id)->update([
                'status' => $status == 'accepted' ? 'active' : 'cancelled',
                'teacher_id' => $teacher_id->teacher_id,
            ]);
            $teacher = Appliedrequest::where('teacher_id', $id)->first();
            $noti = new ApprovedRejectNotification();
            $noti->teacher_id = $teacher->teacher_id;
            $noti->parent_id = $parent_id;
            $noti->message = $status == 'accepted' ? 'Yours request approved' : 'Yours request rejected';
            $noti->dataType = $status == 'accepted' ? 'accepted' : 'rejected';
            $noti->save();
            
           
        }


// Firebase Notification Start Here
        
        $firebaseToken = Customer::where('id',$id)->pluck('device_token');
        $parent_data = Customer::where('id',$parent_id)->first();
        if($status =="cancelled")
        {
            $status = "Rejected";
        }
        $parentdata = $parent_data->firstname .' '.$parent_data->lastname .' '.$status." your request";
        
         $img_path =  asset('/public/userImages/');
        //  $notifydata=DB::table('customers as c')
        //  ->select(['c.id as user_id', DB::raw('concat( "'.$img_path .'/",c.image) AS user_image'), 'ur.*',DB::raw('DATE_FORMAT(ur.created_at, "%d %b-%Y") as created_at')])
        //  ->join('user_requests as ur', 'c.id', '=', 'ur.customer_id')
        //  ->where('ur.id', $id)
        //  ->get()->first();
      
        $API_KEY = env('FIRE_BASE_SERVER_API_KEY');
        $SERVER_API_KEY = $API_KEY;
         
        $data2 = [
            "registration_ids" => $firebaseToken,
            "notification" => [
                "title" => $parentdata,
                "body" => "unread",
              
               
            ],
          "data"=> ['datauser'=>"0",'type'=>'teacher_request']
            
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
        
        // Firebase Notification End Here

        return $this->reponseMessage('Request accepted successfully', 'success');
    }

    public function appliedRequestList($id)
    {

        $data = Customer::from('customers as c')
            ->join('applied_requests as ar', 'c.id', '=', 'ar.teacher_id')
            ->whereNull('ar.status')
            ->where('ar.request_id', $id)
            ->get(['c.*', 'ar.request_id', 'ar.teacher_id', 'ar.id', 'ar.price','ar.notes']);
        if ($data->isNotEmpty()) {
            return AppliedRequestCollection::collection($data);
        }
        return $this->reponseMessage('Data not found', 'error');
    }

    public function teacherRequestList($id=null)
    {
      if($id == null)
      {
          $id = -1;
      }
        $data = Customer::from('customers as c')
            ->join('user_requests as ur', 'c.id', '=', 'ur.customer_id')
            ->leftjoin('applied_requests as ar', 'ar.request_id', '=', 'ur.id')
            ->where('ur.status', null)
            ->select('c.image', 'ur.*', 'ar.id as applied_request_id', DB::raw($id.' as teacher_new_id'))
            ->get();
   

        if ($data->isNotEmpty()) {
            return ParentRequestsResourceCollection::collection($data);
        }
        return $this->reponseMessage('Data not found', 'error');
    }

    public function detail($id)
    {

        $data = Customer::from('customers as c')
            ->join('user_requests as ur', 'c.id', '=', 'ur.customer_id')
            ->where('ur.id', $id)->first(['c.image', 'ur.*']);

        if ($data) {

            return new RequestDetail($data);
        }
        return $this->reponseMessage('Data not found', 'error');
    }

    public function sameCode1()
    {
        return Customer::from('customers as c')
            ->join('user_requests as ur', 'c.id', '=', 'ur.customer_id')
            ->where('c.type', 1);
    }

    public function userRequestList($id)
    {
        //echo $id; exit;
        $data = Customer::from('customers as c')
            ->join('user_requests as ur', 'c.id', '=', 'ur.customer_id')
            ->where('ur.customer_id', $id)->get(['c.*', 'ur.*']);

        if ($data->isNotEmpty()) {
            return UserRequestsResource::collection($data);
        }
        return $this->reponseMessage('Data not found', 'error');
    }

    public function sameCode($id)
    {
        return Customer::from('customers as c')
            ->join('user_requests as ur', 'c.id', '=', 'ur.customer_id')
            ->where('ur.customer_id', $id);
    }

    public function requestList($id, $status)
    {

        $data = Customer::from('customers as c')
            ->join('user_requests as ur', 'c.id', '=', 'ur.customer_id')
            ->where('ur.customer_id', $id)
            ->where('ur.status', $status == 'null' ? null : $status)
            ->get(['c.*', 'ur.*']);

        if ($data->isNotEmpty()) {
            return UserRequestsResource::collection($data);
        }

        return $this->reponseMessage('Data not found', 'error');
    }

    public function listing($id, $status)
    {

        $data = Customer::from('customers as c')
            ->join('user_requests as ur', 'c.id', '=', 'ur.customer_id')
            ->where('ur.teacher_id', $id)
            //->where('ur.customer_id',$id)
            ->where('ur.status', $status == 'null' ? null : $status)
            ->get(['c.image', 'c.firstname', 'c.lastname', 'c.gender', 'ur.*']);


        if ($data->isNotEmpty()) {
            return UserRequestsResource::collection($data);
        }

        return $this->reponseMessage('Data not found', 'error');
    }

    public function moveRequest($id, $status)
    {

        $data = UserRequest::where('id', $id)->update([

            'status' => $status,
        ]);

        if ($data) {

            return $this->reponseMessage('Done', 'success');
        }

        return $this->reponseMessage('Data not found', 'error');
    }


}
