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