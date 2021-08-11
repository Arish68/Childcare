<?php

namespace App\Http\Resources;
use App\Models\Customer;
use Illuminate\Http\Resources\Json\JsonResource;

class AppliedRequestCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */

    public function toArray($request)
    {
           
        return [

                  'id'      => $this->id,

                  'request_id' => $this->request_id,

                   'firstname' => $this->firstname,

                    'lastname' => $this->lastname,

                    'email' =>  $this->email,

                    'password' => $this->password,

                    'phone_no' => $this->phone_no,

                    'gender' => $this->gender,

                    'address' => $this->address,
                    
                    'teacher_id' => $this->teacher_id,
                    
                    'notes' => $this->notes,
                    
                    'type' => $this->type == 1 ? 'Parent' : 'Service Provider',

                    'rate' => $this->rate,
                  

                    'user_image'  => asset('public/userImages/'.$this->image),
        ];
    }
}
