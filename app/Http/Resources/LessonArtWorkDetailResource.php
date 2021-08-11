<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\jsonResource;
use App\Models\LessonArtWorks;

class LessonArtWorkDetailResource extends jsonResource
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

            'id' => $this->id,
            //'Parant_Image' => $this->parant_image,
            'Parant_Image' => is_null($this->parant_image) ? '0' : asset('public/userImages/'.$this->parant_image),
            'Parant_Name' => $this->firstname.' '.$this->lastname,
            'Art_Image' => is_null($this->image) ? '0' : asset('public/lessonImages/artworks/'.$this->image),
           'Remarks' => $this->remarks,
           //'Date' => createdAtDateFormate($this->art_created_at),
          // 'Art Detail' => route('lesson-artwork-detail',$this->art_id)
        ];
    }
}
