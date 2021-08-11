<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Customer;
class RatingCollection extends JsonResource
{
    
    public function toArray($request)
    {
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

            'id'=>$this->id,

            'name'=>is_null($this->firstname) ? '0' : $this->firstname.' '. $this->lastname,

            'userimage'=>$this->image ==null ? '0' : asset('public/userImages/'.$this->image),

            'review'=>is_null($this->reviews) ? '0' : $this->reviews,
            
            'teacher_info' => $teacher_data ? $teacher_data : null,

            'stars' =>is_null($this->stars) ? '0' : strval($this->stars),

            'time' =>  \Carbon\Carbon::parse($this->created_at)->diffForHumans(),

        ];
    }
}
