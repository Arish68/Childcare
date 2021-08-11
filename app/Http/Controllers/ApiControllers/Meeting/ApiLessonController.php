<?php

namespace App\Http\Controllers\ApiControllers\Meeting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use App\Models\Meeting;
use App\Models\Lesson;
use App\Models\Customer;
use App\Models\LessonArtWorks;
use App\Models\AddartworkNotifications;
use App\Models\AddMeetupNotifications;
use App\Http\Resources\LessonArtWorksResource;
use App\Traits\ResponseTrait;
use App\Http\Requests\Meeting\AddArtWorkRequest;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\LessonResource;
use App\Http\Resources\ArtResource;
use App\Http\Resources\ParantsForArtWorkResource;
use App\Http\Resources\LessonDetailResource;
use App\Http\Resources\LessonArtWorkDetailResource;

class ApiLessonController extends Controller
{
    
	 use ResponseTrait;

    function __construct($foo = null)
    {
      $this->parant =1;
    }

     public function allLessons($date=null){
            if($date != null)
            {
               $data=Lesson::from('lessons as l')
                       ->join('lesson_cetogires as lc','lc.id','=','l.category_id')
                   	   ->select('l.*','lc.title as cat_title','lc.id as cat_id')
                       ->where('l.status',1)
                       ->where('l.lesson_month', $date)
                       ->orderBy('l.created_at', 'DESC')
                       ->get(); 
            }
            else
            {
            $data=Lesson::from('lessons as l')
                       ->join('lesson_cetogires as lc','lc.id','=','l.category_id')
                   	   ->select('l.*','lc.title as cat_title','lc.id as cat_id')
                       ->where('l.status',1)
                       ->orderBy('l.created_at', 'DESC')
                       ->get();  
            }
     		



     	//$data=Meeting::all();
     	if ($data->isNotEmpty()) {    		
     		return LessonResource::collection($data);
     	}
     	return $this->reponseMessage('Lessons not found','error');
     }

     public function lessonDetail($id){
     	
    // 	echo 'Lesson detail'; exit;
    // 	$data=Meeting::find($id);


    /*    $data=Lesson::from('lessons as l')
                      // ->join('customers as c','c.id','=','law.teacher_id')
                       ->join('lessonartworks as law','law.lesson_id','=','l.id')
                       ->join('lesson_cetogires as lc','lc.id','=','l.category_id')
                       ->select('l.*','law.id as art_id','law.image as art_image','law.title as art_title','lc.title as category_title')
                       ->where('l.status',1)  //Teacher
                       ->where('l.id',$id)  
                  
                       ->get();*/

        $data=Lesson::from('lessons as l')
                      ->join('lesson_cetogires as lc','lc.id','=','l.category_id')
                       ->select('l.*','lc.title as category_title')
                       ->where('l.status',1)  //Active Lesson
                       ->where('l.id',$id)
                       ->get();      

                    //  dd($data);      
          if ($data) {
               //return new LessonDetailResource($data);
               return LessonDetailResource::collection($data);
          }
          return $this->reponseMessage('Lesson not found','error');
     }

    public function lessonArtworklist($lid,$uid,$type)
    {
        if($type == 'parent')
        {
          $data = LessonArtWorks::from('lessonartworks as law')
    		   ->join('lessons as l','l.id','=','law.lesson_id')
    		   ->select('law.id as art_id','law.teacher_id as teacher_id','law.image as art_image','law.parant_id as art_parent','law.remarks as remarks','law.title as art_title','law.created_at as art_created_at','l.id as lesson_id')
    	       ->where('law.lesson_id',$lid)->where('law.parant_id',$uid)->get();
          
          
        }
         if($type == 'teacher')
        {
       
          $data = LessonArtWorks::from('lessonartworks as law')
    		   ->join('lessons as l','l.id','=','law.lesson_id')
    		   ->select('law.id as art_id','law.teacher_id as teacher_id','law.image as art_image','law.parant_id as art_parent','law.remarks as remarks','law.title as art_title','law.created_at as art_created_at','l.id as lesson_id')
    	       ->where('law.lesson_id',$lid)->where('law.teacher_id',$uid)->get();
        }
       
          if ($data) {
               return ArtResource::collection($data);
          }
          return $this->reponseMessage('Lesson not found','error');
    }


     public function lessonArtWorkDetail($id)
     {

        //  dd($data);    
         // $data=LessonArtWorks::find($id); 
           $data=LessonArtWorks::from('lessonartworks as law')
                      ->join('customers as c','c.id','=','law.parant_id')
                       ->select('law.*','c.firstname','c.lastname','c.image as parant_image')
                       ->where('law.status',1)  //Active Art
                       ->where('law.id',$id)  
                       ->get();             
          if ($data) {
          
        AddartworkNotifications::where('art_id',$id)->update(['status'=>1]);
               return LessonArtWorkDetailResource::collection($data);
          }
          return $this->reponseMessage('Art Work not found','error');
     
     }
    

     public function addArtWork(Request $request)
     {
       

        // echo 'Just chc'; exit;
          $data=$request->all();
          if($request->hasFile('image')){
            $extension=$request->image->extension();
            $filename=time()."_.".$extension;
            $request->image->move(public_path('lessonImages/artworks'),$filename);
              $data['image']=$filename;
          }
          $result=LessonArtWorks::create($data);
          $art_id = $result->id;
         // dd($art_id);


          if ($result) {  
         $data = array( 
          'parant_id' => $request->parant_id, 
          'teacher_id' => $request->teacher_id, 
          'lesson_id' => $request->lesson_id, 
          'art_id' =>  $art_id
        );  
     //   print_r($data); exit;
          
          AddartworkNotifications::create($data);        
              return response([
                  'message'=>'Art Work Created Successfully.',
                  'status' =>'success'
              ]);
          }
          return response([
                  'message'=>'Art Work Not Created.',
                  'status' =>'error'
              ]);
         
     }

     public function searchParants($value='')
     {

        //$data = Customer::all()
        $data=Customer::where('type', $this->parant)->get();
        if ($data->isNotEmpty()) {        
        return ParantsForArtWorkResource::collection($data);
      }
      return $this->reponseMessage('Lessons not found','error');
     }
        
     

}
