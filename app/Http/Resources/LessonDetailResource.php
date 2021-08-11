<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\LessonResource;
//use App\Http\Resources\LessonDetailResource;
use App\Http\Resources\LessonArtWorksResource;
use App\Models\Lesson;
//use App\Models\Lesson_category;
use App\Models\LessonArtWorks;

class LessonDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

       //echo 'just check'; exit;
        $artworks=LessonArtWorks::lessonArtwork($this->id);
      
        return [

            'id' => $this->id,
            'title' => $this->title,
            'category_title' => $this->category_title,
            'purpose' => $this->purpose,
            'supplies_1' => $this->supplies_1,
            'supplies_2' => $this->supplies_2,
            //'meeting_date' => dateFormate($this->meeting_date),
            //'meeting_time' => date('H:i',strtotime($this->meeting_time)),         
           // 'description' => $this->description,
          //  'address' => $this->address,
            'image' =>asset('public/lessonImages/'.$this->image),
            'total_artworks' => strval(LessonArtWorks::getTotalMembers($this->id)), 
            'created_at' => createdAtDateFormate($this->created_at),
            'art_works' => LessonArtWorksResource::collection($artworks),
            
        ];
    
        
/*        return [

            'id' => $this->id,
            'title' => $this->title,
            'cat_title' => $this->cat_title,
            'purpose' => $this->purpose,
            'supplies_1' => $this->supplies_1,
            'supplies_2' => $this->supplies_2,
            'image' => asset('public/lessonImages/'.$this->image),   
            'total_lessons' => strval(Lesson::getTotalMembers($this->id)),      
            'single_detail' => route('lesson-detail',$this->id)
            
        ];*/
    }
}
