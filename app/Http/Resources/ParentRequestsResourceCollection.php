<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\ParentChildRequest;
use App\Models\ParentChildren;
use App\Models\Appliedrequest;
class ParentRequestsResourceCollection extends JsonResource
{
  
    public function toArray($request)
    {
        $check = null;
     $childrequest = ParentChildren::join('parent_child_requests as pcr', 'parent_childrens.id', '=', 'pcr.child_id')->where('pcr.request_id', '=', $this->id)->get();
   if($this->teacher_new_id != -1 )
   {
       $check = Appliedrequest::where('teacher_id', $this->teacher_new_id)->where('request_id',$this->id)->exists(); 
       $check ? $check = 'Applied' :  $check = 'Not Applied';
       
   }
    

        
        return [

            'id'      => $this->id,
            'user_id' => $this->customer_id,  //Parent Id
            'applied_request_id'=>$this->applied_request_id,
            'kids'=>$childrequest,
            'teacher_new_id'=> $this->teacher_new_id ? $this->teacher_new_id : null ,
            'is_applied' => $check,
            'service' => $this->service,
            'address' => $this->address,
            'from'    => dateFormate($this->from),
            'to'      => dateFormate($this->to),
            'status'  => is_null($this->status) ? 'new' : $this->status,
            'created_at'  => createdAtDateFormate($this->created_at),
            'user_image'  => asset('public/userImages/'.$this->image),
            'single_request' => route('detail',$this->id)
        ];
    }
}
