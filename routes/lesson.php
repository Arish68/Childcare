<?php

/*
use Illuminate\Support\Facades\Route;

 Route::prefix('lessons')->name('lessons')->group(function(){

  	    Route::get('lessons/all','LessonsController@index')->name('all');

    	Route::get('lessons/add','LessonsController@add')->name('add');
        Route::post('lessons/store','MeetupController@store')->name('store');

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
*/
?>
<?php

// api file

use Illuminate\Support\Facades\Route;

    //All Available Lessons 
    Route::get('lessons-list','ApiLessonController@allLessons');

    Route::get('lesson-detail/{id}','ApiLessonController@lessonDetail')->name('lesson-detail');


    //Route::get('meeting-detail/{id}','AvailableMeetingController@meetingDetail')->name('meeting-detail');

    // Join Meeting Controller
    //Route::post('join-meeting','JoinMeetingController@joinMeeting');

    // Meeting Controllers
    //Route::post('meeting-comment','MeetingCommentsController@postComment');
    
  
?>