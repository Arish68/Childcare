<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;

class Comment extends Model
{
    protected $guarded=[];

    static public function meetingComments($meeting_id){

    	return Comment::from('comments as cc')
    		   ->leftjoin('customers as c','c.id','=','cc.current_id')
    		   ->leftjoin('users as u','u.id','=','cc.admin_id')
    		   ->select('c.firstname','c.lastname','c.image','cc.*','u.name as admin_name')
    	       ->where('cc.meeting_id',$meeting_id)->get();
    }
    
}
