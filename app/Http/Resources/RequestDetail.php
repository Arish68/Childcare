<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RequestDetail extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [

            'id'      => $this->id,
            'user_id' => $this->customer_id,
            'service' => $this->service,
            'address' => $this->address,
            'from'    => dateFormate($this->from),
            'to'      => dateFormate($this->to),
            'status'  => is_null($this->status) ? 'new' : $this->status,
            'created_at'  => createdAtDateFormate($this->created_at),
            'user_image'  => asset('public/userImages/'.$this->image),
        ];
    }
}
