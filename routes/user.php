<?php


use Illuminate\Support\Facades\Route;

    Route::post('add-user','UserController@addUser');

    Route::post('user-login','UserController@userLogin');

    Route::get('user-profile/{id}/{login_user?}','UserController@profile');

?>