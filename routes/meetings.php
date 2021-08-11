<?php

// api file

use Illuminate\Support\Facades\Route;

    Route::get('meeting-list','AvailableMeetingController@allMeeting');

    Route::get('meeting-detail/{id}','AvailableMeetingController@meetingDetail')
    ->name('meeting-detail');

    // Join Meeting Controller
    Route::post('join-meeting','JoinMeetingController@joinMeeting');

    // Meeting Controllers
    Route::post('meeting-comment','MeetingCommentsController@postComment');
    
    Route::get('comment-detail/{id}','MeetupController@commentDetail')->name('comment-detail');
    //ALl Lesson APIS


      Route::get('lesson-list/{date?}','ApiLessonController@allLessons');

    Route::get('lesson-detail/{id}','ApiLessonController@lessonDetail')->name('lesson-detail');
    
    Route::get('lesson-artwork-list/{id}/{tid}/{type}','ApiLessonController@lessonArtworklist');
    
    
    Route::get('lesson-artwork-detail/{id}','ApiLessonController@lessonArtWorkDetail')->name('lesson-artwork-detail');

    Route::post('add-artwork','ApiLessonController@addArtWork');
    Route::get('search-parants','ApiLessonController@searchParants')->name('search-parants');
  
?>