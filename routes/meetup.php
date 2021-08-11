<?php


use Illuminate\Support\Facades\Route;

 Route::prefix('meetups')->name('meetups.')->group(function(){

  	    Route::get('meetup-list','MeetupController@index')->name('index');

    	Route::get('add-meetup','MeetupController@add')->name('add');

    	Route::post('store','MeetupController@store')->name('store');

     	Route::get('show-meetup/{id}','MeetupController@show')->name('show');

    	Route::get('edit-meetup/{id}','MeetupController@edit')->name('edit');

    	Route::put('update/{id}','MeetupController@update')->name('update');

    	Route::delete('delete/{id}','MeetupController@delete')->name('delete');

    	Route::get('comment-list/{id}','MeetupController@comments')->name('comments');

    	Route::get('comment-detail/{id}','MeetupController@commentDetail')->name('comment-detail');

    	Route::delete('delete-comment/{id}','MeetupController@deleteComment')->name('delete-comment');

        Route::get('add-comment/{meeting_id}','MeetupController@commentForm')->name('commentForm');

        Route::post('add-comment','MeetupController@addComment')->name('add-comment');

       
 });

?>