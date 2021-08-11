<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;

class FilterTeacherResource extends JsonResource
{
    
    public function toArray($request)
    {
        return [

                    'id' =>$this->id,

                    'firstname' => $this->firstname,

                    'lastname' => $this->lastname,

                    'email' =>  $this->email,

                    'password' => $this->password,

                    'phone_no' => $this->phone_no,

                    'address' => $this->address,

                    'gender' => $this->gender,

                    'type' => $this->type == 1 ? 'Parent' : 'Service Provider',

                    'userimage'=> asset('public/userImages/'.$this->image),

                    'bio' => $this->bio,

                    'education' => $this->education,

                    'work_history' =>  $this->work_history,

                    'skills' => $this->skills,

                    'rate' => $this->rate,
                     
                    'admin_approved' => $this->admin_approved,
                     
                    'subscription_type' => $this->subscription_type,
                    'subscription_month' => $this->subscription_month,
                    'subscription_status' => $this->subscription_status,
                    'subscription_valid' => $this->subscription_valid,
                    'subscription_trial' => $this->subscription_trial,
                    'trial_ends_at' => $this->trial_ends_at,
                    
        ];
    }
}




