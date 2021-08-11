<?php

namespace App\Http\Controllers\admin\Subscription;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubscriptionPlan;
use Laravel\Cashier\Cashier;
// use \Stripe\Stripe;
class SubscriptionPlanController extends Controller
{
   	public function __construct(){
    $this->middleware('auth');
    $this->publish = 1;
    $this->unpublish = 0;
   }
   
    public function getPlan(){
		$lists = SubscriptionPlan::orderBy('sort_order', 'ASC')->get();
    	return view('admin.subscription.list',compact('lists'));

    }
    
    public function addSubscription(){
    	return view('admin.subscription.add');
    }
    
    public function showSubscription($id){
		$list = SubscriptionPlan::find($id);
    	return view('admin.subscription.show',compact('list'));

    }
    
    public function editSubscription($id){
    	$list = SubscriptionPlan::find($id);
    	return view('admin.subscription.edit',compact('list'));
    }
    
    public function createPlan(Request $request)
    {
        $st_id = strtolower(trim($request->title));
        $duration = explode(",",$request->plan_duration);
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $stripe = \Stripe\Plan::create(array(
          "amount" => $request->amount * 100,
          "interval" =>$duration[0],
          "interval_count" =>$duration[1],
          "product" => array("name" => $request->title),
          "currency" => $request->currency,
          "id" => $st_id
        ));
        
         SubscriptionPlan::create([
             'stripe_product_id'=>$stripe->product,
             'stripe_plan'=>$st_id,
             'title'=>$request->title,
             'sub_title' =>$request->sub_title,
             'description' =>$request->description,
             'plan_duration' =>$duration[0],
             'duration' =>$duration[1],
             'price' => $request->amount,
             'currency'=>$stripe->currency,
             'sort_order' => $request->sort_order,
           
             ]);
              return redirect(route('get-subPlan'))->with('msg','Subscription Added Successfully.');
        	
    }
    
    public function update(Request $request){

        $subscription=SubscriptionPlan::find($request->id);

        if ($subscription) {
            if($request->status == 0) $active = false; else $active = true;
             $st_id = strtolower(trim($request->title));
                        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
                        $stripe = \Stripe\Plan::update(
                              $subscription->stripe_plan,
                              [
                                  'active' => $active,
                                  ]
                            );
                $subscription->title = $request->title;
                $subscription->sub_title = $request->sub_title;
                $subscription->price = $request->price;
                $subscription->description = $request->description;
                $subscription->status = $request->status;
                $result=$subscription->save();

                return redirect(route('get-subPlan'))->with('msg','Subscription Successfully Updated.');
        }

            return redirect(route('get-subPlan'))->with('msg','Subscription Not Updated.');
        
    }
    
     public function deleteSubscription($id){
        $subscription=SubscriptionPlan::find($id);
        $subscription->delete();
                  if ($subscription) { 
                        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
                        $stripe = \Stripe\Plan::delete(
                              $subscription->stripe_plan
                            );
        
            return redirect(route('get-subPlan'))->with('msg','Subscription Deleted Successfully.');
        }
        else{
            return redirect(route('get-subPlan'))->with('msg','Subscription Not Deleted.');
        }
    }
    
}
