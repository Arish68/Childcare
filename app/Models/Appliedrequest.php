<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appliedrequest extends Model
{
    protected $table='applied_requests';

    protected $guarded=[];
    
    static public function getPrice($parent_id){
        
    	return Appliedrequest::where('parent_id',$parent_id)->first();
    }
}
