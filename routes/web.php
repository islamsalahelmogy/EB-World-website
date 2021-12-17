<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/','HomeController@index')->name('home');
Route::get('home/all/departments','HomeController@show_alldepartments')->name('alldepartments');
Route::get('home/all/subjects','HomeController@show_allsubjects')->name('allsubjects');
Route::get('home/all/doctors','HomeController@show_alldoctors')->name('alldoctors');
Route::get('home/doctor','HomeController@show_doctor')->name('doctor');
Route::get('home/department','HomeController@show_department')->name('department');
Route::get('home/subject','HomeController@show_subject')->name('subject');
Route::get('home/search','SearchController@search')->name('search');

// for inquiries 
Route::get('inquiries','HomeController@show_inquires')->name('inquiries');
Route::post('inquiries/create_inquiry','InquiryController@store')->name('create_inquiry');
Route::post('inquiries/update_inquiry','InquiryController@update')->name('update_inquiry');
Route::post('inquiries/delete_inquiry','InquiryController@destroy')->name('delete_inquiry');

// for replies 
Route::post('inquiries/replies/create_reply','ReplyController@store')->name('create_reply');
Route::post('inquiries/replies/update_reply','ReplyController@update')->name('update_reply');
Route::post('inquiries/replies/delete_reply','ReplyController@destroy')->name('delete_reply');

// for login and register
Route::get('login','Auth\LoginController@showLogin')->name('show_login');
Route::get('register','Auth\RegisterController@showRegister')->name('show_register');

//make login,logout as admin
Route::post('login/admin','Auth\LoginController@adminLogin')->name('admin.login');
Route::get('logout/admin','Auth\LoginController@adminLogout')->name('admin.logout'); 

//make login,logout as user
Route::post('login/user','Auth\LoginController@userLogin')->name('user.login');
Route::get('logout/user','Auth\LoginController@userLogout')->name('user.logout');

//make register for user
Route::post('register/user','Auth\RegisterController@register')->name('user.register');

//change password for admin and user
Route::get('reset_password','Auth\LoginController@showResetPassword')->name('show_reset_password');
Route::post('change_password','Auth\LoginController@changePassword')->name('change_password');


// for get message error 404
Route::get('error','HomeController@getError')->name('error');


Route::group(['middleware' => 'auth:user'], function () { 
    // for auth user 
    Route::get('user/profile','User\UserController@index')->name('user.profile');
    Route::get('user/settings','User\UserController@settings')->name('user.settings');
    Route::post('user/update/basic','User\UserController@updateBasic')->name('user.basic.update');
    Route::post('user/update/image','User\UserController@updateImage')->name('user.image.update');
    Route::post('user/update/pass','User\UserController@changePassword')->name('user.pass.update');
});



Route::group(['middleware' => 'auth:admin'], function () { 

    //for auth admin
    Route::get('admin/profile','Admin\ProfileController@index')->name('admin.profile');
    Route::get('admin/settings','Admin\ProfileController@settings')->name('admin.settings');
    Route::post('admin/update/basic','Admin\ProfileController@updateBasic')->name('admin.basic.update');
    Route::post('admin/update/image','Admin\ProfileController@updateImage')->name('admin.image.update');
    Route::post('admin/update/pass','Admin\ProfileController@changePassword')->name('admin.pass.update');

    //for dashboard
    //------------------------------------Admin routes ------------------------------------------
    //Route::get('admin/admins/show','Admin\AdminController@show')->name('admin.admins.show');
    Route::get('admin/dashboard','Admin\DashboardController@index')->name('admin.dashboard');
    Route::get('admin/admins','Admin\AdminController@index')->name('admin.admins');
    Route::post('/admin/admins/store', 'Admin\AdminController@store')->name('admin.admins.store');
    Route::get('admin/admins/edit/{id}','Admin\AdminController@edit')->name('admin.admins.edit');
    Route::post('admin/admins/updatebasic','Admin\AdminController@updateBasicAdmin')->name('admin.admins.updatebasic');
    Route::post('admin/admins/updateimage','Admin\AdminController@updateImageAdmin')->name('admin.admins.updateimage');
    Route::post('admin/admins/updatepass','Admin\AdminController@updatePassAdmin')->name('admin.admins.updatepass');
    Route::get('admin/admins/delete/{id}','Admin\AdminController@destroy')->name('admin.admins.delete');

    Route::get('admin/doctors','Admin\DoctorController@index')->name('admin.doctors');
    //Route::get('admin/doctors/show','Admin\DoctorController@show')->name('admin.doctors.show');
    Route::get('admin/doctors/edit','Admin\DoctorController@edit')->name('admin.doctors.edit');

    Route::get('admin/departments','Admin\DepartmentController@index')->name('admin.departments');
    //Route::get('admin/departments/show','Admin\DepartmentController@show')->name('admin.departments.show');
    Route::get('admin/departments/edit','Admin\DepartmentController@edit')->name('admin.departments.edit');

    Route::get('admin/subjects','Admin\SubjectController@index')->name('admin.subjects');
    //Route::get('admin/subjects/show','Admin\SubjectController@show')->name('admin.subjects.show');
    Route::get('admin/subjects/edit','Admin\SubjectController@edit')->name('admin.subjects.edit');

    Route::get('admin/levels','Admin\LevelController@index')->name('admin.levels');
    //Route::get('admin/levels/show','Admin\LevelController@show')->name('admin.levels.show');
    Route::get('admin/levels/edit/{id}','Admin\LevelController@edit')->name('admin.levels.edit');
    Route::post('/admin/levels/store', 'Admin\LevelController@store')->name('admin.levels.store');
    Route::post('admin/level/update','Admin\LevelController@update')->name('admin.levels.update');
    Route::get('admin/levels/delete/{id}','Admin\LevelController@destroy')->name('admin.levels.delete');


});