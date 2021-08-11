<?php 

   function createdAtDateFormate($value){

   	  return date('d M-Y',strtotime($value));
   }

   function dateFormate($value){
   	
   	 return date('d M-Y',strtotime($value));
   }

   function getHours($value){

   	  return date('H',strtotime($value));
   }

   function getTime($value){

   	  return date('H:i',strtotime($value));
   }
   
?>