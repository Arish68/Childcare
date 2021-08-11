<?php

namespace App\Http\Controllers\admin\Meetup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Meeting;
use App\Models\Comment;
use DB;
use App\Models\AddMeetupNotifications;
use App\Models\AdminMeetupCommentNotification;
use App\Http\Requests\Meeting\MeetingRequest;
use App\Traits\ResponseTrait;


class MeetupController extends Controller
{

	public function __construct(){

    $this->middleware('auth');
    
   }

    public function add(){

    	return view('admin.meetups.add');
    }

     public function index(){

     	 $list= Meeting::all();
     	$comment_count= DB::table('comments')
            ->join('meetings', 'comments.meeting_id', '=', 'meetings.id')
            ->select('comments.meeting_id as meet_id', DB::raw('count(*) as total'))
            ->groupBy('meeting_id')
            ->where('comments.is_admin_read',0)
            ->get();

    	return view('admin.meetups.list',compact('list','comment_count'));
    }

    public function store(MeetingRequest $request){

        $data=$request->validated();
        if($request->hasFile('image')){
          $extension=$request->image->extension();
          $filename=time()."_.".$extension;
          $request->image->move(public_path('meetupImages'),$filename);
          $data['image']=$filename;
        }
        $result=Meeting::create($data);
       //  $art_id = $result->id;
         $meetup_id = $result->id;
         $meetup_title = $result->title;

        if ($result) {  

        $meetup_notification_array = array (
        'meetup_id' =>$meetup_id, 
        'meetup_title' =>$meetup_title 
        );   
        $meetup_notification = AddMeetupNotifications::create($meetup_notification_array);  
            return redirect(route('meetup-management.meetups.index'))->with('msg','Meeting Added Successfully.');
        }
            return redirect(route('meetup-management.meetups.index'))->with('msg','Meeting Not Added.');
        
    }


    public function show($id){
         $list=Comment::meetingComments($id);
         Comment::where('meeting_id',$id)->update(['is_admin_read'=>1]);
        //return view('admin.meetups.all-comments',['list'=>$list,'meeting_id'=>$id]);
        $meetup=Meeting::find($id);
        if ($meetup) {
            return view('admin.meetups.show',['meetup'=>$meetup,'list'=>$list]);
        }
            return redirect(route('meetup-management.meetups.index'))->with('msg','Meeting Not Found.');
        
    }

    public function edit($id){
        $list=Comment::meetingComments($id);
        $meetup=Meeting::find($id);
        if ($meetup) {         
           return view('admin.meetups.edit',compact('meetup'));
        }
           return redirect(route('meetup-management.meetups.index'))->with('msg','Meeting Not Found.');     
    }

     public function update(Request $request){

        $meetup=Meeting::find($request->id);

        if ($meetup) {
            
                $meetup->title = $request->title;
                $meetup->description = $request->description;
                $meetup->meeting_date = $request->meeting_date;
                $meetup->meeting_time = $request->meeting_time;
                $meetup->address =$request->address;
                if($request->hasFile('image')){

                        $fileName=$meetup->image;
                        $filenamePath = public_path().'/meetupImages/'.$fileName;
                        \File::delete($filenamePath);
                        $meetup->delete();

                      $extension=$request->image->extension();
                      $filename=time()."_.".$extension;
                      $request->image->move(public_path('meetupImages'),$filename);
                      $meetup->image=$filename;
                }
                $result=$meetup->save();
                return redirect(route('meetup-management.meetups.index'))->with('msg','Meeting Successfully Updated.');
        }

            return redirect(route('meetup-management.meetups.index'))->with('msg','Meeting Not Updated.');
        
    }

    public function delete($id){
    	
        $meetup=Meeting::find($id);

        $file=$meetup->image;
        $filename = public_path().'/meetupImages/'.$file;
        \File::delete($filename);
        Comment::where('meeting_id',$id)->delete();
        $meetup->delete();
        if ($meetup) {          
            return redirect(route('meetup-management.meetups.index'))->with('msg','Meeting Deleted Successfully.');

        }else{

            return redirect(route('meetup-management.meetups.index'))->with('msg','Meeting Not Deleted.');
        }
    }


    public function comments($id){

        $list=Comment::meetingComments($id);
        return view('admin.meetups.all-comments',['list'=>$list,'meeting_id'=>$id]);
    }

    public function commentDetail($id){

        $comment=Comment::find($id);
        return view('admin.meetups.comment-detail',[

                    'comment'=>$comment,
                    'meeting_id'=>$comment->meeting_id
        ]);
    }

     public function deleteComment($id){

        $comment=Comment::find($id);
        if ($comment) {
            $comment->delete();
            return back()->with('msg','Comment Deleted Successfully.');
        }
            return back()->with('msg','Comment Not Deleted.');
       
    }

    public function commentForm($id){

        return view('admin.meetups.add-comment',['meeting_id'=>$id]);
    }

    public function addComment(Request $request){



                //$data=$request->validated();     
        $meetup_id= $request->meeting_id; 
        $meeting = Meeting::where('id',$meetup_id)->first();
            //dd($meeting->id);
        $meetup_title = $meeting->title;
        //  echo  $admin_id = $request->admin_id;
     
        $data=$request->all();
        $result=Comment::create($data);

        $comment_id = $result->id;
        // exit;
        if ($result) {   

               $comment_notifications = 
                array(
                    'comment_id' =>$comment_id , 
                    'meetup_id' =>$meetup_id , 
                    'meetup_title' =>$meetup_title , 
            );
        
    $meetup_comment_notification =  AdminMeetupCommentNotification::create($comment_notifications); 
     return response()->json(['success' => 'Comment Added Successfully']);
            //return back()->with('msg','Comment Added Successfully.');
        }
            return back()->with('msg','Comment Not Added.');
        
    }



}
