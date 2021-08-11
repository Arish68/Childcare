<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Lesson;

class LessonResource extends JsonResource
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

            'id' => $this->id,
            'title' => $this->title,
            'cat_title' => $this->cat_title,
            'purpose' => $this->purpose,
            'supplies_1' => $this->supplies_1,
            'supplies_2' => $this->supplies_2,
            'image' => asset('public/lessonImages/'.$this->image),   
            'total_lessons' => strval(Lesson::getTotalMembers($this->id)),      
            'single_detail' => route('lesson-detail',$this->id)
            
        ];
    }
}
