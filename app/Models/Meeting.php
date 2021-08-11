<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Meeting_User;

class Meeting extends Model
{
    protected $guarded=[];

    static public function getTotalMembers($meeting_id){

    	return Meeting_User::where('meeting_id',$meeting_id)->count();
    }
    
}
