<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\LessonArtWorks;

class LessonArtWorks extends Model
{
    protected $guarded=[];
    protected $table='lessonartworks';


    static public function getTotalMembers($id){

    	return LessonArtWorks::where('lesson_id',$id)->count();
    }

	static public function lessonArtwork($lesson_id){

    	return LessonArtWorks::from('lessonartworks as law')
    		   ->join('lessons as l','l.id','=','law.lesson_id')
    		   //->leftjoin('users as u','u.id','=','cc.admin_id')
    		   ->select('law.id as art_id','law.teacher_id as teacher_id','law.image as art_image','law.parant_id as art_parent','law.remarks as remarks','law.title as art_title','law.created_at as art_created_at','l.id as lesson_id')
    	       ->where('law.lesson_id',$lesson_id)
               //->where('law.lesson_id',$lesson_id)
               ->get();
    }
  
}
