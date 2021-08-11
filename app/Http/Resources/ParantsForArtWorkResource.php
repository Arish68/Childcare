<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\LessonResource;
//use App\Http\Resources\LessonDetailResource;
use App\Http\Resources\LessonArtWorksResource;
use App\Models\Lesson;
//use App\Models\Lesson_category;
use App\Models\LessonArtWorks;

class ParantsForArtWorkResource extends JsonResource
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
        //$artworks=LessonArtWorks::lessonArtwork($this->id);
        return [

            'id' => $this->id,
            'name' => $this->firstname.' '.$this->lastname,
          //  'category_title' => $this->category_title,
          
            
        ];
    
        

    }
}
