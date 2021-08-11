<?php 

use Illuminate\Support\Facades\Route;
   
   // Parent Side 
   Route::post('create-request','UserRequestController@createRequest');

   Route::get('all-requests/{id}','UserRequestController@userRequestList');

   Route::get('my-requests/{id}/{status}','UserRequestController@requestList');
   // approve or reject
   Route::get('change-status/{id}/{request_id}/{parent_id}/{status}','UserRequestController@changeStatus');

   // Teacher routes

   Route::get('parent-requests/{id?}','UserRequestController@teacherRequestList');

   Route::get('request-detail/{id}','UserRequestController@detail')->name('detail');

   Route::get('requests-list/{id}/{status}','UserRequestController@listing');
   
   // apply request
   Route::post('apply-request','UserRequestController@apply');

   Route::get('applied-requests/{id}','UserRequestController@appliedRequestList');

   // cancel request
   Route::get('move-request/{id}/{status}','UserRequestController@moveRequest');

   // cancel request
   

?>