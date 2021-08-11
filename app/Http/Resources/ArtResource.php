<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\LessonArtWorks;
use App\Models\Customer;
use DB;
class ArtResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
         $img_path =  asset('/public/userImages/');
         $parent_detail = DB::table('customers')->select('*', DB::raw('concat( "'.$img_path .'/",image) AS image'))->where('id',$this->art_parent)->get();
         $teacher_detail = DB::table('customers')->select('*', DB::raw('concat( "'.$img_path .'/",image) AS image'))->where('id',$this->teacher_id)->get();
        
       
        return [

            'id' => $this->art_id,
            'lesson_id' => $this->lesson_id,
            'teacher_id' => $this->teacher_id,
            'parent_id' =>$this->art_parent,
            'art_Title' => $this->art_title,
            'parent_detail' => $parent_detail,
            'teacher_detail' => $teacher_detail,
            'remarks'=>$this->remarks,
            //'Art Image' => $this->art_image,
            //'name' => is_null($this->admin_name) ? $this->firstname.' '.$this->lastname : $this->admin_name,
            //'type' => is_null($this->admin_name) ? 'User' : 'Admin',
            'art_Image' => is_null($this->art_image) ? '0' : asset('public/lessonImages/artworks/'.$this->art_image),
           // 'comment' => $this->message,
           'date' => createdAtDateFormate($this->art_created_at),
           
           'art_Detail' => route('lesson-artwork-detail',$this->art_id)
        ];
    }
}
