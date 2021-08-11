<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Appliedrequest;
use App\Models\ParentChildRequest;
use App\Models\ParentChildren;
use App\Models\Customer;
use DB;
class UserRequestsResource extends JsonResource
{
   
    public function toArray($request)
    {
       $price= Appliedrequest::getPrice($this->customer_id);
       $childrequest = ParentChildren::join('parent_child_requests as pcr', 'parent_childrens.id', '=', 'pcr.child_id')->where('pcr.request_id', '=', $this->id)->get();
     if($this->teacher_id != null)
     {
       $teacher_data =  Customer::find($this->teacher_id);
       $teacher_data['image']= asset('public/userImages/'.$teacher_data->image);  
     }
     else
     {
         $teacher_data = null;
     }
       
        return [

            'id'      => $this->id,
            'user_id' => $this->customer_id,
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'service' => $this->service,
            'gender' => $this->gender,
            'address' => $this->address,
            'kids' =>$childrequest,
            'teacher_id' => $this->teacher_id,
            'teacher_info' => $teacher_data ? [$teacher_data] : null,
            'type' => $this->type == 1 ? 'Parent' : 'Service Provider',
            'from'    => dateFormate($this->from),
            'to'      => dateFormate($this->to),
            'status'  => is_null($this->status) ? 'new' : $this->status,
            'created_at'  => createdAtDateFormate($this->created_at),
            'user_image'  => asset('public/userImages/'.$this->image)

        ];
    }
    
}
