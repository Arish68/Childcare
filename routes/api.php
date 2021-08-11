<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('request-notification/{id}','ApiControllers\Notifications\GetRequestNotification@index');

Route::get('status-request-notification/{id}','ApiControllers\Notifications\GetRequestNotification@statusNotificaion');

Route::post('give-feedback','ApiControllers\Rating\RatingController@rating');

Route::post('teacher-rate-parent','ApiControllers\Rating\RatingController@rate');


Route::get('feedback-list/{request_id}','ApiControllers\Rating\RatingController@getRating');
Route::get('feedback-list-rate/{request_id}','ApiControllers\Rating\RatingController@getRating_rate');

Route::get('feedback-teacher/{teacher_id}/{type}','ApiControllers\Rating\RatingController@getTeacherRating');

Route::get('request-notification-status/{id}','ApiControllers\Notifications\GetRequestNotification@changeRequestNotification');


Route::get('approve-reject-notification-status/{id}','ApiControllers\Notifications\GetRequestNotification@approveRejectNotification');

Route::post('search-result','ApiControllers\User\UserController@search');
Route::get('parents','ApiControllers\User\UserController@getParents');
Route::get('teachers','ApiControllers\User\UserController@getTeachers');
//Password Reset APis

Route::post('create', 'ApiControllers\User\UserController@create');
Route::post('find', 'ApiControllers\User\UserController@find');
Route::post('reset', 'ApiControllers\User\UserController@reset');
    
Route::get('get-added-artwork-notification/{id}','ApiControllers\Notifications\GetRequestNotification@getParantAddedArtWorkNotification');
Route::get('get-added-meetup-notification','ApiControllers\Notifications\GetRequestNotification@getAddedMeetupNotification');
Route::get('get-added-meetup-comment-notification/{id}','ApiControllers\Notifications\GetRequestNotification@getAddedMeetupCommentNotification');
//Route::get('chnage-status-of-added-artwork-notification/{id}','ApiControllers\Notifications\GetRequestNotification@changeStatusOfgetParantAddedArtWorkNotification');

Route::post('addartwork','ApiControllers\Meeting\ApiLessonController@addArtWork');
 
Route::post('user-notification','ApiControllers\User\UserController@allnotification');
Route::post('delete-notification','ApiControllers\User\UserController@deleteNotification');
Route::post('status-update-notification','ApiControllers\User\UserController@statusnotification');
Route::get('lesson-detail/{id}','ApiControllers\Notifications\GetRequestNotification@lessonDetail')->name('lesson-detail');
 
//Payment
Route::post('stripe-payment','ApiControllers\Payment\StripePaymentController@process');          // Recursive Payment
Route::post('payment-status','ApiControllers\Payment\StripePaymentController@subscribe_status'); // Check Recursive Payment Status
Route::post('trial-payment-status','ApiControllers\Payment\StripePaymentController@checkTrial');  // Check Trial Payment Status
Route::get('list-subscription-plan','ApiControllers\Payment\StripePaymentController@getAllSubscription');
Route::post('user-trial','ApiControllers\Payment\StripePaymentController@trial');//Start trial

//Childern of their Parent 
 
Route::post('add-children', 'ApiControllers\User\UserController@addchild');
Route::get('list-children/{id}', 'ApiControllers\User\UserController@listchild');
Route::get('list-request-children/{id}', 'ApiControllers\User\UserController@requestlistchild');
Route::get('count-notification/{id}', 'ApiControllers\User\UserController@getNotiCount');

//Filter Data
Route::post('filter-teacher', 'ApiControllers\Filter\FilterController@findTeacherFilter');





