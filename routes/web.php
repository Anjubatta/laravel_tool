<?php

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
    return redirect('login');
});

Auth::routes();

//verify account
Route::get('/user/verify/{email}/{token}', 'VerificationController@verifyUser');
Route::post('password/create', 'VerificationController@password')->name('password.create');
Route::get('home', 'Controller@home')->name('home');


/**
* Auth permission
*/
Route::group(['middleware' => 'auth'], function () {
	
	/**
	* middleware super admin check
	*/
	Route::group(['middleware' => 'check-permission:superadmin', 'prefix' => 'superadmin'], function () {
		//dashboard		
		Route::get('/dashboard', 'Superadmin\DashboardController@index')->name('superadmin.dashboard.index');

		//announcements
		Route::resource('/announcements', 'Superadmin\AnnouncementsController', ['as' => 'superadmin']);

		//company
		Route::resource('/company', 'Superadmin\CompanyController', ['as' => 'superadmin']);

		//reports
		Route::get('/reports', 'Superadmin\ReportsController@index')->name('superadmin.reports.index');

		//reports prefix
		Route::group(['prefix' => 'reports'], function () {
			//payment
			Route::resource('/payment', 'Superadmin\PaymentController', ['as' => 'superadmin']);
			//renew
			Route::post('/payment/{payment}/renew', 'Superadmin\PaymentController@renew')->name('superadmin.payment.renew');

		});
	});





	/**
	* middleware admin check
	*/
	Route::group(['middleware' => 'check-permission:admin', 'prefix' => 'admin'], function () {
		//dashboard
		Route::get('/dashboard', 'Admins\DashboardController@index')->name('admin.dashboard.index');

		//announcements
		Route::resource('/announcements', 'Admins\AnnouncementsController', ['as' => 'admin']);
		
		//Daily logs
		Route::resource('/dailylogs', 'Admins\DailylogsController', ['as' => 'admin']);
		
		//classes
		Route::resource('/classes', 'Admins\ClassesController', ['as' => 'admin']);
		
		//Attendances
		Route::resource('/attendances', 'Admins\AttendancesController', ['as' => 'admin']);
		
		//Fees
		Route::resource('/fees', 'Admins\Student_fee', ['as' => 'admin']);
		
		//company
		Route::resource('/company', 'Admins\CompanyController', ['as' => 'admin']);
		//company
		
		Route::get('/reports', 'Admins\ReportsController@index')->name('admin.reports.index');
		
		Route::get('/foods', 'Admins\ReportsController@foods')->name('admin.reports.foods');
		
		Route::get('/medicines', 'Admins\ReportsController@medicines')->name('admin.reports.medicines');
		
		Route::get('/deviations', 'Admins\ReportsController@deviations')->name('admin.reports.deviations');
		
		Route::get('/incidents', 'Admins\ReportsController@incidents')->name('admin.reports.incidents');
		
		
	/* Route::group(['prefix' => 'leaves/{leave}'], function () {
			//leaves
			Route::get('/edit', 'Admins\Leaves_teachersController@edit',['as'=>'admin']);
			
			Route::post('/update', 'Admins\Leaves_teachersController@update',['as'=>'admin']);
			Route::post('/destroy', 'Admins\Leaves_teachersController@destroy',['as'=>'admin'])->name('admin.leaves.destroy');
			
		});	 */
		
		//Students
	Route::resource('/students', 'Admins\StudentsController',['as' => 'admin']);
		
		Route::group(['prefix' => 'students/{student}'], function () {
			
			//relation			
			Route::post('/updaterel', 'Admins\Parent_relationsController@updaterel',['as'=>'admin'])->name('admin.relation.updaterel');
			Route::post('/destroyrel', 'Admins\Parent_relationsController@destroyrel',['as'=>'admin'])->name('admin.relation.destroyrel');
			
			
			
			//classes
			Route::resource('/class', 'Admins\ClassesStudentsController',['as'=>'admin']);
			
			
			Route::resource('/relation', 'Admins\Parent_relationsController',['as'=>'admin']);
		
			// portfolio
			Route::resource('/portfolios', 'Admins\PortfoliosController',['as'=>'admin']);
			
			// Incidents 
			Route::resource('/incidents', 'Admins\IncidentsController',['as'=>'admin']);
			
			// Food and Drugs 
			Route::resource('/fooddrugs', 'Admins\FooddrugsController',['as'=>'admin']);
			//Medicines
			Route::resource('/medicines', 'Admins\MedicinesController',['as'=>'admin']);
			//Deviation
			Route::resource('/deviations', 'Admins\DeviationsController',['as'=>'admin']);
			
		});
		
		
		//Student parent relation
		Route::post('/add_parent/', 'Admins\StudentsController@add_parent', ['as' => 'admin']);
	Route::post('/checkClassUnique/', 'Admins\ClassesTeachersController@checkClassUnique', ['as' => 'admin']);
		//Parents
		Route::resource('/parents', 'Admins\ParentsController', ['as'=>'admin']);
		
		
		Route::resource('/teachers', 'Admins\TeachersController',['as'=>'admin']);
		
		//Leaves
		Route::get('/leaves', 'Admins\Teacher_leavesController@all_leaves', ['as' => 'admin']);
		
		//admin >> teachers prefix
		Route::group(['prefix' => 'teachers/{teacher}'], function () {
			//leaves
			Route::resource('/leaves', 'Admins\Teacher_leavesController',['as'=>'admin']);
			
			//classes
			Route::resource('/class', 'Admins\ClassesTeachersController',['as'=>'admin']);
			
			
			//rating
			Route::post('/ratingadd', 'Admins\TeachersController@ratingadd')->name('admin.ratingadd');
			//classes
		
		});	
		
		
		
	});





	/**
	* middleware management check
	*/
	Route::group(['middleware' => 'check-permission:management'], function () {
		//dashboard

	});





	/**
	* middleware teachers check
	*/
	
	/**
	* middleware teachers check
	*/
	Route::group(['middleware' => 'check-permission:teacher', 'prefix' => 'teacher'], function () {
		//dashboard
		
		Route::get('/dashboard', 'Teachers\DashboardController@index')->name('teacher.dashboard.index');

		//Profile

		Route::get('/profile','Teachers\DashboardController@profile')->name('teacher.dashboard.profile');

		//Leaves
			Route::resource('/leaves', 'Teachers\Leaves_teachersController',['as'=>'teacher']);
		//Parents

			Route::resource('/parents', 'Teachers\ParentsController', ['as'=>'teacher']);
		
		//student profile

			Route::resource('/students', 'Teachers\StudentsController', ['as'=>'teacher']);

			Route::group(['prefix' => 'students/{student}'], function () {			
						// portfolio
				Route::resource('/portfolios', 'Teachers\PortfoliosController',['as'=>'teacher']);
						
					});
					
			//Attendances
			Route::resource('/attendances', 'Teachers\AttendancesController', ['as' => 'teacher']);
			//portfoilos
			Route::group(['prefix' => 'students/{student}'], function () {
			Route::resource('/portfoilo','Teachers\PortfoilosController',['as'=> 'teacher']);

		});	
	});







	/**
	* middleware parents check
	*/
	Route::group(['middleware' => 'check-permission:parents'], function () {
		//dashboard

	});




});