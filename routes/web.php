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
Route::get('inquires','HomeController@show_inquires')->name('inquires');
Route::get('home/all/departments','HomeController@show_alldepartments')->name('alldepartments');
Route::get('home/all/subjects','HomeController@show_allsubjects')->name('allsubjects');
Route::get('home/all/doctors','HomeController@show_alldoctors')->name('alldoctors');
//Route::get('department_doctors','HomeController@show_department_doctros')->name('department.doctors');
//Route::get('department_subjects','HomeController@show_department_subjects')->name('department.subjects');
Route::get('home/doctor','HomeController@show_doctor')->name('doctor');
Route::get('home/department','HomeController@show_department')->name('department');
Route::get('home/subject','HomeController@show_subject')->name('subject');
Route::get('home/search','SearchController@search')->name('search');
// for login and register
Route::get('login','Auth\LoginController@showLogin')->name('show_login');
Route::get('register','Auth\RegisterController@showRegister')->name('show_register');

// for get message error 404
Route::get('error','HomeController@getError')->name('error');



// for auth user 
Route::get('user/profile','User\UserController@index')->name('user.profile');
Route::get('user/settings','User\UserController@settings')->name('user.settings');



//for auth admin
Route::get('admin/profile','Admin\ProfileController@index')->name('admin.profile');
Route::get('admin/settings','Admin\ProfileController@settings')->name('admin.settings');

//for dashboard
Route::get('admin/admins','Admin\AdminController@index')->name('admin.admins');
//Route::get('admin/admins/show','Admin\AdminController@show')->name('admin.admins.show');
Route::get('admin/admins/edit','Admin\AdminController@edit')->name('admin.admins.edit');

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
Route::get('admin/levels/edit','Admin\LevelController@edit')->name('admin.levels.edit');


