<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/


Route::group(['middleware' => 'auth:api'], function(){
Route::post('details', 'Api\AppkeysController@details');
});

Route::group(['namespace' => 'Api'], function () {
	Route::get('/admin_announcement', 'AppkeysController@admin_announcement')->name('api');
	Route::get('/get_classes', 'AppkeysController@get_classes')->name('api');
	Route::get('/get_student_list', 'AppkeysController@get_student_list')->name('api');
	Route::get('/get_student_detail', 'AppkeysController@get_student_detail')->name('api');
	Route::post('login/', 'AppkeysController@login')->name('api');
	Route::post('add_attendance/', 'AppkeysController@add_attendance')->name('api');
	Route::get('get_teacher_list/', 'AppkeysController@get_teacher_list')->name('api');
	Route::get('get_teacher_detail/', 'AppkeysController@get_teacher_detail')->name('api');
	Route::get('get_student_attendance/', 'AppkeysController@get_student_attendance')->name('api');
	Route::get('attendance/', 'AppkeysController@attendance')->name('api');
	
	Route::post('passwordreset/', 'AppkeysController@passwordreset')->name('api');
	
	Route::get('get_parent_list/', 'AppkeysController@get_parent_list')->name('api');
	
	Route::get('get_parent_portfolio/', 'AppkeysController@get_parent_portfolio')->name('api');
	Route::get('get_StudentDetail_for_parents/', 'AppkeysController@get_StudentDetail_for_parents')->name('api');
	
	Route::get('get_teacher_portfolio/', 'AppkeysController@get_teacher_portfolio')->name('api');
		
	Route::post('post_portfolio/', 'AppkeysController@post_portfolio')->name('api');
	
	
	Route::get('get_portfiolo/','AppkeysController@get_portfiolo')->name('api');
});