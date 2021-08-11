<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Lesson;

class Lesson extends Model
{
    protected $guarded=[];
    protected $table='lessons';


    static public function getTotalMembers($id){

    	return Lesson::where('id',$id)->count();
    }
    
}
