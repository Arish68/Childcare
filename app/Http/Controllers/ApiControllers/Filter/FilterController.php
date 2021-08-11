<?php

namespace App\Http\Controllers\ApiControllers\Filter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Customer;
use DB;
use Auth;
use Validator;
use App\Http\Resources\User\FilterTeacherResource;


class FilterController extends Controller
{
    //
    public function findTeacherFilter(Request $request){
        
        $user = Customer::find($request->parent_id);
        $distance = $request->distance;
        $users =  Customer::query();
        
//Gender Filter        
        if ($request->has('gender')) {
            $genders = $request->gender;
           
                  $users->orWhere('gender',$gender);
           
        }
        
        
//Radius Filter       
        if($request->latitude && $request->longitude)
        {
                            $users->select("*", DB::raw("6371 * acos(cos(radians(" . $user->latitude . "))
                                * cos(radians(latitude)) * cos(radians(longitude) - radians(" . $user->longitude . "))
                                + sin(radians(" .$user->latitude. ")) * sin(radians(latitude))) AS distance"));
                                $users->having('distance', '<', $distance);
        }

        
//Rate Filter        
        if ($request->has('minrate') && $request->has('maxrate') ) {
             $users->orWhereBetween('rate', [$request->minrate,$request->maxrate]);
        }

        $userdata= $users->where('type',0)->get();
        
        if($userdata->isEmpty())
        {
           return response()->json([
            "userdata" => [],
            "message" => "Teachers not Found",
            "status" => 'error'
        ],404);  
        }
        $userlist = FilterTeacherResource::collection($userdata);
        return response()->json([
            "userdata" => $userlist,
            "message" => "Filter data",
            "status" => 'success'
        ],200);
    }
    

    
}
