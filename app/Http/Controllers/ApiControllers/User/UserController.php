<?php

namespace App\Http\Controllers\ApiControllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\User\AddUserRequest;
use App\Http\Requests\User\UserLoginRequest;
use App\Models\Customer;
use App\Models\ParentChildren;
use App\Models\ParentNotification;
use App\Models\ParentChildRequest;
use App\Models\Appliedrequest;
use App\Http\Resources\UserRequestsResource;
use App\Models\RateNotification;
use App\Models\MeetingNotification;
use App\Models\ApprovedRejectNotification;
use App\Http\Resources\User\LoginResource;
use App\Http\Resources\SearchedTeachersCollection;
use App\Notifications\EmailVerificationRequest;
use App\Notifications\PasswordResetRequest;
use App\Notifications\PasswordResetSuccess;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Middleware\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\PasswordReset;
class UserController extends Controller
{

    public function addUser(Request $request){

            $data=$request->all();
    	    if($request->hasFile('image')){
    	      $extension=$request->image->extension();
    	      $filename=time()."_.".$extension;
    	      $request->image->move(public_path('userImages'),$filename);
              $data['image']=$filename;
    	    }

    	    $request->skills ? $data['skills'] = json_decode($request->skills) : null;

             $validator = Validator::make($data, [
            'firstname' => 'required',
            'lastname' => 'required',
            'gender' => 'required',
            'email' => 'unique:customers|required|email',
            'type' => 'required',
            'password' => 'required',
            'phone_no' => 'required',
            'address' => 'required',

                  ]);
           if ($validator->fails()) {
                return response([
    	            'message'=>'User already Created.',
    	            'status' =>'error'
    	        ]);
            }
            $data['password'] = bcrypt($request->password);
    	    $result=Customer::create($data);
    	    if ($result) {
    	        return response([
    	            'message'=>'Record Created Successfully.',
    	            'status' =>'success'
    	        ]);
    	    }
    	    return response([
    	            'message'=>'Record Not Created.',
    	            'status' =>'error'
    	        ]);
    	   }

    public function userLogin(UserLoginRequest $request){

    	      $user=Customer::where('email',$request->email)->first();
    	      if (!$user) {
                 return response(['message' => 'Wrong Email Entered','status' =>'error']);
                    }
              $checkpass = Hash::check($request->password, $user->password);

         if(!$checkpass)
         {
             return response(['message' => 'Login Not Successfully','status' =>'error']);
         }


       $customer =  Customer::where('id',$user->id)->update(['device_token'=>$request->device_token]);

    	if (!empty($user)) {
    	      $user['type']= $user->type == 1 ? 'Parent' : 'Service Provider';
    	      $user['image']=asset('public/userImages/'.$user->image);
    	      return response(['message' => 'Login Successfully', 'data'=>$user,'status' =>'success']);
    		  //return new LoginResource($user);
    	}
              return response(['message' => 'Login Not Successfully','status' =>'error']);
    }

    public function profile($id,$login_user=null){
        // 1 parent
        // 0 Teacher
        
        $is_request_accept = false;
     $user=Customer::find($id);
        if($login_user != null)
        {
           $login_user_data =Customer::find($login_user);
           
                {
                    if($login_user_data->type == 1 && $user->type==0)
                    {
                       $accepted_request =  Appliedrequest::where([['parent_id',$login_user],['teacher_id',$id],['status','accepted']])->first();  
                       $accepted_request ? $is_request_accept = true : $is_request_accept=false;
                        
                    }
                    if($login_user_data->type == 0 && $user->type==1)
                    {
                        $accepted_request = Appliedrequest::where([['teacher_id',$login_user],['parent_id',$id],['status','accepted']])->first();   
                        $accepted_request ? $is_request_accept = true : $is_request_accept=false;
                        
                    }
                  
                }  
        }
               
         

        if (!empty($user)) {

             $logindata = LoginResource::make($user);
                 return response(['data'=>$logindata,'is_request_accept'=>$is_request_accept,'message' => 'Login Successfully','status' =>'success']);
        }
              return response(['message' => 'Profile Not Found','status' =>'error']);
    }

    public function getParents(){


         $img_path =  asset('/public/userImages/');
         $user=DB::table('customers')->select('*', DB::raw('concat( "'.$img_path .'/",image) AS image'))->where('type',1)->get();

        if (!empty($user)) {

              return  response(['message' => 'Parent Found','Parent_list' => $user ,'status' =>'success']);
        }
              return response(['message' => 'Parent Not Found','status' =>'error']);
    }

    public function getTeachers(){

         $img_path =  asset('/public/userImages/');
         $user=DB::table('customers')->select('*', DB::raw('concat( "'.$img_path .'/",image) AS image'))->where('type',0)->get();

        if (!empty($user)) {

             return  response(['message' => 'Teacher Found','Teacher_list' => $user ,'status' =>'success']);
        }
              return response(['message' => 'Teacher Not Found','status' =>'error']);
    }

    public function search(Request $request){
        
        $user = Customer::find($request->parent_id);
        $distance = $request->distance;
        $users =  Customer::query();   
        
//Radius Filter       
        if($request->distance)
        {
                        $users = $users->select("*", DB::raw("6371 * acos(cos(radians(" . $user->latitude ."))
                                * cos(radians(latitude)) * cos(radians(longitude) - radians(" . $user->longitude ."))
                                + sin(radians(" .$user->latitude.")) * sin(radians(latitude))) AS distance"));
                        $users = $users->having('distance', '<', $distance);
        }
        
//Name Filter        
        if ($request->has('name')) {
            $name = $request->name;
            $name->where('firstname', 'LIKE', "%{$name}%")->orWhere('lastname', 'LIKE', "%{$name}%");
        }
        
//Rate Filter        
        if ($request->has('minrate') && $request->has('maxrate') ) {
             $users->where('rate', '>=', $request->minrate)->where('rate', '<=', $request->maxrate)->get();
        }
                
        
//Gender Filter        
        if ($request->has('gender')) {
            $genders = $request->gender;
            $users->where('gender',$genders);
        }
        

        
         $data = $users->where('type',0)->get();
        
        
// Old query
        //  $data=Customer::select('*')

        //           ->when( !empty($request->gender), function($query) use ($request) {
        //                     return $query->where('gender', '=',$request->gender);
        //                 })
        //           ->when( !empty($request->minrate) && !empty($request->maxrate), function($query) use($request) {

        //                  return $query->whereBetween('rate', [$request->minrate,$request->maxrate]);
        //                 })
        //                 ->where('type',0)
        //                 ->get();
   
         if (!empty($data)) {
              return SearchedTeachersCollection::collection($data);
        }
              return response(['message' => 'Record Not Found','status' =>'error']);
    }

    public function create(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
        ]);
        $user = Customer::where('email', $request->email)->first();
        if (!$user)
            return response()->json(['message' => "We can't find a user with that e-mail address.",'status' =>'error'],400);
        $passwordReset = PasswordReset::updateOrCreate(
            ['email' => $user->email],

            [
                'email' => $user->email,
                'token' =>  mt_rand(100000, 999999),
             ]
        );
        if ($user && $passwordReset)
            $user->notify(
                new PasswordResetRequest($passwordReset->token)
            );
        return response()->json(['message' => 'We have e-mailed your password reset link!' ,'status' =>'success'],200);
    }
    public function find(Request $request)
    {
        $passwordReset = PasswordReset::where('token', $request->token)->first();
        if (!$passwordReset)
          return response(['message' => 'This password reset token is invalid.','status' =>'error']);
        if (Carbon::parse($passwordReset->updated_at)->addMinutes(720)->isPast()) {
            $passwordReset->delete();

             return response()->json(['message' => 'This password reset token is invalid.','status' =>'error'],400);
        }

             return response()->json(['message' => 'This password reset token is valid.','customer'=>$passwordReset,'status' =>'success'],200);

    }
     /**
     * Reset password
     *
     * @param  [string] email
     * @param  [string] password
     * @param  [string] password_confirmation
     * @param  [string] token
     * @return [string] message
     * @return [json] user object
     */
    public function reset(Request $request)
    {

        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|confirmed|string',
            'password_confirmation' => 'required|string',
            'token' => 'required'
        ]);
        $passwordReset = PasswordReset::where([['token', $request->token], ['email', $request->email]])->first();
        if (!$passwordReset)
            return response()->json([
                'message' => "This password reset token is invalid."
            ,'status' =>'error'], 404);
        $user = Customer::where('email', $passwordReset->email)->first();
        if (!$user)
            return response()->json([
                'message' => "We can't find a user with that e-mail address.",
            'status' =>'error'], 404);
        $user->password = bcrypt($request->password);
        $user->save();
        $passwordReset->delete();
        $user->notify(new PasswordResetSuccess($passwordReset));
      return response()->json(['message' => 'This password reset.','customer'=>$user,'status' =>'success'],200);

    }
   public function allnotification(Request $request)
   {
       $customer_id=$request->customer_id;
       $is_parent= Customer::find($customer_id);
       $img_path =  asset('/public/userImages/');

    //   0 == teacher 1 == parent

        if($is_parent->type == 0)
        {
             $allmeetingdata = Customer::from('customers as cu')
            ->join('meeting_notifications as mn', 'cu.id', 'mn.commenter_id')
            ->join('meetings as m', 'mn.meeting_id', 'm.id')
            ->where('mn.customer_id',$customer_id)
            ->get(['mn.id as noti_id','cu.*',DB::raw('concat( "'.$img_path .'/",cu.image) AS customer_image'),'m.title as meeting_title','mn.*','mn.status as noti_status','mn.message as message' ,'mn.dataType'])->all();

        //Parent Data
           $requestdata = Customer::from('customers as cu')
            ->join('parent_notifications as pn', 'cu.id', 'pn.parent_id')
            ->join('user_requests as usr','pn.request_id','usr.id')
            ->where('pn.teacher_id',$customer_id)
            ->get(['usr.id as noti_id','cu.*',DB::raw('concat( "'.$img_path .'/",image) AS customer_image') ,'pn.*',DB::raw('DATE_FORMAT(usr.created_at, "%d %b-%Y") as request_created_at'),'usr.service','pn.status as noti_status','pn.dataType'])->all();

          //Accept or Reject Data
           $acceptorrejectdata = Customer::from('customers as cu')
            ->join('approved_reject_notifications as arn', 'cu.id', 'arn.parent_id')
            ->where('arn.teacher_id',$customer_id)
            ->get(['arn.id as noti_id','cu.*',DB::raw('concat( "'.$img_path .'/",image) AS customer_image') ,'arn.*','arn.status as noti_status','arn.message as message','arn.dataType'])->all();
             $newArray =  array_merge($allmeetingdata,$acceptorrejectdata);


          //Rated Data
           $ratedata = Customer::from('customers as cu')
            ->join('rate_notifications as pn', 'cu.id', 'pn.parent_id')
            ->join('user_requests as usr','pn.request_id','usr.id')
            ->join('customers as parentdata', 'pn.parent_id', 'parentdata.id')
            ->where('pn.viewer_id',$customer_id)
            ->get(['pn.id as noti_id','cu.*','pn.id as notiiId' , DB::raw('concat( "'.$img_path .'/",cu.image) AS customer_image')  , DB::raw('concat( "'.$img_path .'/",parentdata.image) AS parent_image'),'pn.*',DB::raw('DATE_FORMAT(usr.created_at, "%d %b-%Y") as request_created_at'),'usr.*','usr.service','pn.status as noti_status','pn.dataType'])->all();

           $finalArray =  array_merge($newArray,$ratedata);


            return response([
                 'notifications'=>$finalArray,
                  'status' =>'success'
              ]);

        }
        else
        {
          $allmeetingdata = Customer::from('customers as cu')
            ->join('meeting_notifications as mn', 'cu.id', 'mn.commenter_id')
            ->join('meetings as m', 'mn.meeting_id', 'm.id')
            ->where('mn.customer_id',$customer_id)
            ->get(['mn.id as noti_id','cu.*',DB::raw('concat( "'.$img_path .'/",cu.image) AS customer_image'),'m.title as meeting_title','mn.*','mn.status as noti_status','mn.message as message','mn.dataType'])->all();

         //Teacher Data
            $requestdata = Customer::from('customers as cu')
            ->join('parent_notifications as pn', 'cu.id', 'pn.teacher_id')
            ->join('user_requests as usr','pn.request_id','usr.id')
            ->join('customers as parentdata', 'pn.parent_id', 'parentdata.id')
            ->where('pn.parent_id',$customer_id)

            ->get(['pn.id as noti_id','cu.*',DB::raw('concat( "'.$img_path .'/",cu.image) AS customer_image') ,DB::raw('concat( "'.$img_path .'/",parentdata.image) AS parent_image'),'pn.*','pn.status as noti_status',DB::raw('DATE_FORMAT(usr.created_at, "%d %b-%Y") as request_created_at'),'usr.service','usr.address as request_address','pn.dataType'])->all();


             //Accept or Reject Data
           $acceptorrejectdata = Customer::from('customers as cu')
            ->join('approved_reject_notifications as arn', 'cu.id', 'arn.teacher_id')
            ->where('arn.parent_id',$customer_id)
            ->get(['arn.id as noti_id','cu.*',DB::raw('concat( "'.$img_path .'/",image) AS customer_image'),'arn.*','arn.status as noti_status','arn.message as message','arn.dataType' ])->all();

          $newArray =  array_merge($allmeetingdata,$requestdata);
          
          
            //Rated Data
           $ratedata = Customer::from('customers as cu')
            ->join('rate_notifications as pn', 'cu.id', 'pn.teacher_id')
            ->join('user_requests as usr','pn.request_id','usr.id')
            ->join('customers as parentdata', 'pn.parent_id', 'parentdata.id')
            ->where('pn.viewer_id',$customer_id)
            ->get(['pn.id as noti_id','cu.*',DB::raw('concat( "'.$img_path .'/",cu.image) AS customer_image') , DB::raw('concat( "'.$img_path .'/",parentdata.image) AS parent_image'), 'pn.*',DB::raw('DATE_FORMAT(usr.created_at, "%d %b-%Y") as request_created_at'),'usr.*','usr.service','pn.status as noti_status','pn.dataType'])->all();

           $finalArray =  array_merge($newArray,$ratedata);

            return response([
                  'notifications'=>$finalArray,
                  'status' =>'success'
              ]);
        }

   }
   
   
   public function deleteNotification(Request $request)
   {
       
       if($request->type == 'meeting')
       {
           $is_deleted = MeetingNotification::find($request->id)->delete();
           if($is_deleted)
           {
                  return response([
                  'message'=>'Deleted',
                  'status' =>'success'
              ]);
           }
           return response([
                  'message'=>'Not Deleted',
                  'status' =>'error'
              ]);
       }
       if($request->type == 'accepted')
       {
           $is_deleted = ApprovedRejectNotification::find($request->id)->delete();
            if($is_deleted)
           {
                  return response([
                  'message'=>'Deleted',
                  'status' =>'success'
              ]);
           }
           return response([
                  'message'=>'Not Deleted',
                  'status' =>'error'
              ]);
       }
       if($request->type == 'rejected')
       {
          $is_deleted =  ApprovedRejectNotification::find($request->id)->delete();
            if($is_deleted)
           {
                  return response([
                  'message'=>'Deleted',
                  'status' =>'success'
              ]);
           }
           return response([
                  'message'=>'Not Deleted',
                  'status' =>'error'
              ]);
       }
       if($request->type == 'ApplyRequest')
       {
        $is_deleted =  ParentNotification::find($request->id)->delete();
          if($is_deleted)
           {
                  return response([
                  'message'=>'Deleted',
                  'status' =>'success'
              ]);
           }
           return response([
                  'message'=>'Not Deleted',
                  'status' =>'error'
              ]);
       }
         if($request->type == 'Rated')
       {
        $is_deleted =  RateNotification::find($request->id)->delete();
          if($is_deleted)
           {
                  return response([
                  'message'=>'Deleted',
                  'status' =>'success'
              ]);
           }
           return response([
                  'message'=>'Not Deleted',
                  'status' =>'error'
              ]);
       }
       return response([
                  'message'=>'Please check required parameters',
                  'status' =>'error'
              ]);
    
   }
    public function statusnotification(Request $request)
    {
        $typeData = $request->type;
        $notify_id = $request->id;

        if($typeData == "ApplyRequest")
        {
         ParentNotification::where('id',$notify_id)->update(['status'=>'1']);
           return response([
                  'message'=>'Update',
                  'status' =>'success'
              ]);
        }
        elseif($typeData == "accepted" || $typeData == "rejected" )
        {
             ApprovedRejectNotification::where('id',$notify_id)->update(['status'=>'1']);
           return response([
                  'message'=>'Update',
                  'status' =>'success'
              ]);
        }
        elseif($typeData == "meeting" )
        {
         MeetingNotification::where('id',$notify_id)->update(['status'=>'1']);
           return response([
                  'message'=>'Update',
                  'status' =>'success'
              ]);
        }
        elseif($typeData == "Rated" )
        {
         RateNotification::where('id',$notify_id)->update(['status'=>'1']);
           return response([
                  'message'=>'Update',
                  'status' =>'success'
              ]);
        }
        else
        {
             return response([
                  'message'=>'Not found any Type',
                  'status' =>'error'
              ]);
        }

    }

//Create Child
 public function addchild(Request $request){

         $data=$request->all();

          $validator = Validator::make($data, [
            'name' => 'required',
                  ]);


          if ($validator->fails()) {
                return response([
    	            'message'=>'Child already Created.',
    	            'status' =>'error'
    	        ]);
            }


    	    $result=ParentChildren::create($data);

    	    if ($result) {
    	        return response([
    	            'message'=>'Record Created Successfully.',
    	            'status' =>'success'
    	        ]);
    	    }


    	    return response([
    	            'message'=>'Record Not Created.',
    	            'status' =>'error'
    	        ]);
   }

//list Child
public function listchild($id){


         $childern=ParentChildren::where('parent_id',$id)->get();

        if (!empty($childern)) {

             return  response(['message' => 'Child Found','child_list' => $childern ,'status' =>'success']);
        }
              return response(['message' => 'Child Not Found','status' =>'error']);
    }
    
//list Child by request id
public function requestlistchild($id){

     $data = Customer::from('customers as c')
            ->join('user_requests as ur', 'c.id', '=', 'ur.customer_id')
            ->where('ur.id', $id)
            ->where('ur.status','!=' ,'null')
            ->get(['c.image', 'c.firstname', 'c.lastname', 'c.gender', 'ur.*']);


        if ($data->isNotEmpty()) {
            return UserRequestsResource::collection($data);
        }


              return response(['message' => 'Child Not Found','status' =>'error']);
    }
        
    
//get Count Unread Notification
public function getNotiCount($id){
        $cutomer_count  = new Customer(); 
        $unread_count =  $cutomer_count->getNotificationCount($id);

        if (!empty($unread_count)) {

             return  response(['message' => 'Total Count Unread notification','count' => $unread_count ,'status' =>'success']);
        }
              return response(['message' => 'No Unread notification Yet','status' =>'error']);
    }
}

