<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SearchedTeachersCollection extends JsonResource
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

                    'id' =>$this->id,

                    'firstname' => $this->firstname,

                    'lastname' => $this->lastname,

                    'email' =>  $this->email,

                    'phone_no' => $this->phone_no,

                    'address' => $this->address,

                    'gender' => $this->gender,

                    'rate' => $this->rate,

                    'userimage'=> asset('public/userImages/'.$this->image),

        ];
    }
}
