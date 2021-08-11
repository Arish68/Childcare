<?php

use Illuminate\Support\Facades\Route;
use App\Models\Customer;
use App\Models\Meeting;
use App\Models\Lesson;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

// admin home page
Route::get('/admin',function(){

    $totalParents  = Customer::where('type',1)->count();
    $totalTeachers = Customer::where('type',0)->count();
    $totalMeetings = Meeting::count();
    $totalLesson   = Lesson::count();
    return view('admin.index',compact('totalParents','totalTeachers','totalMeetings','totalLesson'));

})->name('/admin')->middleware('auth');



//Parents
Route::get('parents','admin\User\ParentController@viewParents')->name('view-parents');
Route::delete('deleteparents/{id}','admin\User\ParentController@deleteParents')->name('delete-parents');
Route::get('show-parents/{id}','admin\User\ParentController@showParents')->name('show-parents');
Route::get('edit-parents/{id}','admin\User\ParentController@editParents')->name('edit-parents');

//Teachers
Route::get('show-pending-teachers','admin\User\TeacherController@viewPendingTeachers')->name('show-pending-teachers');
Route::delete('approveteachers/{id}','admin\User\TeacherController@approveTeachers')->name('approve-teachers');

Route::get('teachers','admin\User\TeacherController@viewTeachers')->name('view-teachers');
Route::delete('deleteteachers/{id}','admin\User\TeacherController@deleteTeachers')->name('delete-teachers');
Route::get('show-teachers/{id}','admin\User\TeacherController@showTeachers')->name('show-teachers');
Route::get('edit-teachers/{id}','admin\User\TeacherController@editTeachers')->name('edit-teachers');


//Lessons
Route::get('lessons/add','admin\Lessons\LessonsController@add')->name('add');
Route::get('lessons/all','admin\Lessons\LessonsController@all')->name('all');
Route::post('lessons/store','admin\Lessons\LessonsController@store')->name('store');
Route::put('update/{id}','admin\Lessons\LessonsController@update')->name('update');
Route::delete('delete/{id}','admin\Lessons\LessonsController@delete')->name('delete');
Route::get('edit-lesson/{id}','admin\Lessons\LessonsController@edit')->name('edit');
Route::get('publish/{id}','admin\Lessons\LessonsController@publish')->name('publish');
Route::get('lesson-detail/{id}','admin\Lessons\LessonsController@publish')->name('lesson-detail');

//Lessons Category
Route::get('lessons-category/add','admin\Lessons\LessonsController@add_category')->name('add-category');
Route::get('lessons-category/all','admin\Lessons\LessonsController@all_category')->name('all-categories');
Route::post('lessons-category/store','admin\Lessons\LessonsController@store_category')->name('store-category');
Route::put('update-category/{id}','admin\Lessons\LessonsController@update_category')->name('update-category');
Route::delete('delete-category/{id}','admin\Lessons\LessonsController@delete_category')->name('delete-category');
Route::get('edit-category/{id}','admin\Lessons\LessonsController@edit_category')->name('edit-category');
//Route::get('publish/{id}','admin\Lessons\LessonsController@publish')->name('publish');



//Subscription Admin
Route::post('add-subscription', 'admin\Subscription\SubscriptionPlanController@createPlan')->name('add-subPlan');
Route::get('subscriptions/add','admin\Subscription\SubscriptionPlanController@addSubscription')->name('add-subscription');
Route::get('subscriptions', 'admin\Subscription\SubscriptionPlanController@getPlan')->name('get-subPlan');
Route::delete('deletesubscription/{id}','admin\Subscription\SubscriptionPlanController@deleteSubscription')->name('delete-subscription');
Route::get('show-subscription/{id}','admin\Subscription\SubscriptionPlanController@showSubscription')->name('show-subscription');
Route::get('edit-subscription/{id}','admin\Subscription\SubscriptionPlanController@editSubscription')->name('edit-subscription');
Route::put('update-subscription/{id}','admin\Subscription\SubscriptionPlanController@update')->name('update-subscription');
// Teacher Art works
//Route::get('artWorks/add','admin\Lessons\LessonsController@add_category')->name('art-works');
Route::get('artWorks/all','admin\Lessons\LessonsController@allArtWorks')->name('art-works');

//Route::put('update-category/{id}','admin\Lessons\LessonsController@update_category')->name('update-category');
Route::delete('delete-art-works/{id}','admin\Lessons\LessonsController@deleteArtWorks')->name('delete-art-works');
//Route::get('edit-category/{id}','admin\Lessons\LessonsController@edit_category')->name('edit-category');
Auth::routes();






