<?php
namespace App\Traits;
trait ResponseTrait
{
    public function reponseMessage($message,$status){

    	return response([

    	    'message'=>$message,
    	    'status' =>$status
    	    
    	]);
    }
}
