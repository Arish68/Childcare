<?php

namespace App\Http\Controllers\ApiControllers\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubscriptionPlan;
use App\Http\Resources\User\LoginResource;
use Carbon\Carbon;
use Stripe\Stripe;
use App\Models\Payment;
use App\Models\Customer;
use Auth;
class StripePaymentController extends Controller
{
 
   public function trial(Request $request)
    {
        $user_id = $request->user_id;
        $user = Customer::find($user_id);
        $user->subscription_trial = 1;
        $user->trial_ends_at = now()->addDays(1);
        if ($user->save()){
            $user = Customer::find($user_id);
             $logindata = LoginResource::make($user);
          return response()->json(["Data"=>$logindata,"message" => "You Suscribe Trail",'status'=>'success']);
        } else {
            return response()->json(["message" => "Trail Request Not Sent",'status'=>'error']);
        }

    }


//REcursive Start here

    public function process(Request $request)
    
    {
        $user_id = $request->user_id;
        $plan_duration = $request->plan_duration;
        $duration = $request->duration;
        $today = date("Y-m-d");
        $dt = strtotime($today);
        
        $add_month_date = date('Y-m-d', strtotime("+$duration $plan_duration"."s",$dt));
        try {
            Stripe::setApiKey(env('STRIPE_SECRET'));
            $user = Customer::find($user_id);
             if (is_null($user->stripe_id)) {
                $stripeCustomer = $user->createAsStripeCustomer();
            }
            \Stripe\Customer::createSource(
                $user->stripe_id,
                ['source' => $request->tokenId]
            );
           $stripe =  $user->newSubscription('Childcare', $request->stripe_plan)->create(NULL, [
                    'email' => $user->email,
                ]);
                
        $userdata = Customer::find($user_id);
        $userdata->subscription_valid = $add_month_date;
        $userdata->subscription_status = 1;
        $userdata->subscription_trial = 0;
        $userdata->save();
        $newuser = Customer::find($user_id);
       $logindata = LoginResource::make($newuser);
        return response()->json(["stripedata"=>$stripe,"data"=>$logindata,"paid"=>true,"message" => "You subscribtion status",'status'=>'success']);

        } catch (\Exception $ex) {
             return response()->json(["message" => $ex->getMessage(),'status'=>'error']);
            
        }

    } 
    
     public function subscribe_status(Request $request)
     {
     
        $user = Customer::findOrFail($request->user_id);
        $status_trial = $user->onTrial();
         
        if ($status_trial) {
          $user->update(['subscription_trial' => 1]);
        } 
        else {
            $user->update(['subscription_trial' => 0]);
        } 
        
        $status_sub = $user->subscriptions()->active()->count();

        
        if ($status_sub >= 1) {
          $user->update(['subscription_status' => 1,'subscription_trial' => 0]);
          $status_sub = true;
        } 
        else {
            $user->update(['subscription_status' => NULL]);
            $status_sub = false;
        }  
         return response()->json(["trail_status"=>$status_trial,"subscribe_status"=>$status_sub,"message" => "You subscribtion status",'status'=>'success']);
        
     }
     
     public function checkTrial(Request $request)
     {
        
        $user = Customer::findOrFail($request->user_id);
        $trail_status = $user->onTrial();
        return response()->json(["trail_status"=>$trail_status,'status'=>'success']);
     }
    
  
    
//Get All recursion packages
    public function  getAllSubscription()
    {
        $lists = SubscriptionPlan::orderBy('sort_order', 'ASC')->where('status',1)->get();
    
    	 if (!empty($lists)) {
              return response(['data'=>$lists,'message' => 'Subscription Plan Successfully','status' =>'success']);
          }
              return response(['message' => 'Subscription Plan not found','status' =>'error']);
    }
    
    
    
}
