<?php

namespace App\Http\Controllers\ApiControllers\Lesson;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use App\Models\Meeting;
use App\Models\Lesson;
use App\Traits\ResponseTrait;
use App\Http\Resources\LessonResource;
//use App\Http\Resources\MeetingDetailResource;

class ApiLessonController extends Controller
{
    
	 use ResponseTrait;

     public function allLessons(){

      
     	//echo 'All Lession'; exit;
     		    /*$data=Lesson::from('lessons as l')
                       ->join('lesson_cetogires as lc','lc.id','=','l.category_id')
                   	   ->select('l.*','lc.title as cat_title','lc.id as cat_id')
                      ->where('l.status',0)
                      
                       ->get();
*/

           $list=Lesson::from('lessons as l')
                      // ->join('customers as c','c.id','=','law.teacher_id')
                       ->join('lessonartworks as law','law.lesson_id','=','l.id')
                       ->join('lesson_cetogires as lc','lc.id','=','l.category_id')
                       ->select('l.*','law.id as art_id','law.status as art_status','law.created_at as art_created_at','c.firstname','c.lastname','l.title as lesson_title','lc.title as lesson_category')
                       ->where('c.type',0)  //Teacher
                       ->orderBy('law.created_at', 'DESC')
                       ->get();
     	//$data=Meeting::all();
     	if ($data->isNotEmpty()) {    		
     		return LessonResource::collection($data);
     	}
     	return $this->reponseMessage('Lessons not found','error');
     }

     public function lessonDetail($id){
     	
     	echo 'Lesson detail'; exit;
     	$data=Meeting::find($id);
          if ($data) {
               return new MeetingDetailResource($data);
          }
          return $this->reponseMessage('Meeting not found','error');
     }

}
