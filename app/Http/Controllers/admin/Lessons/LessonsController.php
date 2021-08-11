<?php

//namespace App\Http\Controllers;

namespace App\Http\Controllers\admin\Lessons;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Meeting;
use App\Models\Comment;
use App\Models\Customer;
use App\Models\Lesson;
use App\Models\Lesson_category;
use App\Models\LessonArtWorks;
use App\Http\Requests\Lesson\LessonRequest;
use App\Http\Requests\Lesson\LessonCategoryRequest;

class LessonsController extends Controller
{


	public function __construct(){

    $this->middleware('auth');
    $this->publish = 1;
    $this->unpublish = 0;

   }

    public function add(){



		//$list=Lesson::all();
		$list=Lesson_category::orderBy('created_at', 'DESC')->get();
    	return view('admin.lessons.add',compact('list'));


    	//return view('admin.lessons.add');
    }

    public function all(){

      //  echo 'just checl'; exit;
		//$list=Lesson::all();
		//$list=Lesson::orderBy('created_at', 'DESC')->get();


        $list=Lesson::from('lessons as l')
                      // ->join('customers as c','c.id','=','law.teacher_id')
                      // ->join('lessonartworks as law','law.lesson_id','=','l.id')
                       ->join('lesson_cetogires as lc','lc.id','=','l.category_id')
                       ->select('l.*','lc.title as lesson_category')
                       //->where('c.type',0)  //Teacher
                       ->orderBy('l.created_at', 'DESC')
                       ->get();

    	return view('admin.lessons.list',compact('list'));

    }



    public function store(LessonRequest $request){

        $data=$request->validated();
        if($request->hasFile('image')){
          $extension=$request->image->extension();
          $filename=time()."_.".$extension;
          $request->image->move(public_path('lessonImages'),$filename);
          $data['image']=$filename;
        }
        $result=Lesson::create($data);
        if ($result) {
            return redirect(route('all'))->with('msg','Lesson Added Successfully.');
        }
            return redirect(route('add'))->with('msg','Lesson Not Added.');

    }



    public function edit($id){

    	    $lessons=Lesson::from('lessons as l')
                       ->join('lesson_cetogires as lc','lc.id','=','l.category_id')
                   	   ->select('l.*','lc.title as cat_title','lc.id as cat_id')
                       ->where('l.id',$id)

                       ->get();

         //  dd($lessons);

        //$lesson=Lesson::find($id);
        if ($lessons) {
        	//return view('admin.lessons.list',compact('list'));
            return view('admin.lessons.show',compact('lessons'));
        }
            return redirect(route('all'))->with('msg','Lesson Not Found.');

    }

    public function update(Request $request){

        $lesson=Lesson::find($request->id);

        if ($lesson) {


                $lesson->category_id = $request->category_id;
                $lesson->title = $request->title;
                $lesson->purpose = $request->purpose;
                $lesson->supplies_1 = $request->supplies_1;
                $lesson->supplies_2 = $request->supplies_2;
                $lesson->lesson_month = $request->lesson_month;
                if($request->hasFile('image')){

                        $fileName=$lesson->image;
                        $filenamePath = public_path().'/lessonImages/'.$fileName;
                        \File::delete($filenamePath);
                        $lesson->delete();

                      $extension=$request->image->extension();
                      $filename=time()."_.".$extension;
                      $request->image->move(public_path('lessonImages'),$filename);
                      $lesson->image=$filename;
                }
                $result=$lesson->save();
                return redirect(route('all'))->with('msg','Lesson Successfully Updated.');
        }

            return redirect(route('all'))->with('msg','Lesson Not Updated.');

    }

    public function publish($id){


    	//dd($this->unpublish);

        $lesson=Lesson::find($id);
        if ($lesson) {
        	//dd($lesson->status);
        if ($lesson->status == $this->unpublish) {

        	//echo 'lesson 1'; exit;


                $lesson->status = $this->publish;
                $result=$lesson->save();
                return redirect(route('all'))->with('msg','Lesson Successfully Published.');
        }
            //return redirect(route('all'))->with('msg','Lesson Not Unpublished.');


          if ($lesson->status == $this->publish) {
        	//echo 'lesson 0'; exit;



                $lesson->status = $this->unpublish;
                $result=$lesson->save();
                return redirect(route('all'))->with('msg','Lesson Successfully Unpublished.');
        }
            //return redirect(route('all'))->with('msg','Lesson Not Published.');




        }

    }

    public function delete($id){

        $lesson=Lesson::find($id);

        $file=$lesson->image;
        $filename = public_path().'/lessonImages/'.$file;
        \File::delete($filename);
      //  Comment::where('meeting_id',$id)->delete();
        $lesson->delete();
        if ($lesson) {
            return redirect(route('all'))->with('msg','Lesson Deleted Successfully.');

        }else{

            return redirect(route('all'))->with('msg','Lesson Not Deleted.');
        }
    }





                     //All Lesson Category Functions

   public function add_category(){

    	return view('admin.lessons.add_category');
    }

    public function all_category(){

		//$categories=Lesson_category::all();
		$categories=Lesson_category::orderBy('created_at', 'DESC')->get();
    	return view('admin.lessons.list_category',compact('categories'));

    }



    public function store_category(LessonCategoryRequest $request){

        $data=$request->validated();

        $result=Lesson_category::create($data);
        if ($result) {
            return redirect(route('all-categories'))->with('msg','Lesson Category Added Successfully.');
        }
            return redirect(route('add-category'))->with('msg','Lesson Category Not Added.');

    }



    public function edit_category($id){



        $lesson_categories=Lesson_category::find($id);
        if ($lesson_categories) {
        	//dd($lesson_categories);
        	//return view('admin.lessons.list',compact('list'));
            return view('admin.lessons.show_category',compact('lesson_categories'));
        }
            return redirect(route('all-categories'))->with('msg','Lesson Category Not Found.');

    }

    public function update_category(Request $request){

        $lesson=Lesson_category::find($request->id);

        if ($lesson) {


               // $lesson->category_id = $request->category_id;
                $lesson->title = $request->title;
                $lesson->purpose = $request->purpose;
                $lesson->description = $request->description;
               // $lesson->supplies_2 = $request->supplies_2;


                $result=$lesson->save();
                return redirect(route('all-categories'))->with('msg','Lesson Category Successfully Updated.');
        }

            return redirect(route('all-categories'))->with('msg','Lesson Category Not Updated.');

    }



    public function delete_category($id){

        $lesson=Lesson_category::find($id);


        $lesson->delete();
        if ($lesson) {
            return redirect(route('all-categories'))->with('msg','Lesson Cactegory Deleted Successfully.');

        }else{

            return redirect(route('all-categories'))->with('msg','Lesson Cactegory Not Deleted.');
        }
    }



                // Teacher ART & WORKS Functions


    public function allArtWorks()
    {


    //lessons
    //lesson_cetogires
        //$list=Lesson::all();
        $artworks=LessonArtWorks::from('lessonartworks as law')
                       ->join('customers as c','c.id','=','law.teacher_id')
                       ->join('lessons as l','l.id','=','law.lesson_id')
                       ->join('lesson_cetogires as lc','lc.id','=','l.category_id')
                       ->select('law.*','law.id as art_id','law.status as art_status','law.created_at as art_created_at','c.firstname','c.lastname','l.title as lesson_title','lc.title as lesson_category')
                       ->where('c.type',0)  //Teacher
                       ->orderBy('law.created_at', 'DESC')
                       ->get();
/*
        $teacher=Rating::from('lessonartworks as law')
                       ->join('customers as c','c.id','=','law.teacher_id')
                       ->select('c.*','r.*')
                       ->where('c.type',0)  //Teacher
                        ->get(); */
        return view('admin.lessons.show_artworks',compact('artworks'));



    }


    public function deleteArtWorks($id)
    {

        //echo 'just checl'; exit;
        $lesson=LessonArtWorks::find($id);


        $lesson->delete();
        if ($lesson) {
            return redirect(route('art-works'))->with('msg','Art Work Deleted Successfully.');

        }else{

            return redirect(route('art-works'))->with('msg','Art Work Not Deleted.');
        }


    }


}
