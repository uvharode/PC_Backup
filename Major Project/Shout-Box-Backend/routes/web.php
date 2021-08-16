<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

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


//admin login page
Route::get("/", [AdminController::class, 'adminView']);
Route::post("/admin", [AdminController::class, 'adminlogin']);

//------------------------------Admin-------------------------------------------
//Users which are not approved
Route::get('/home', "AdminController@getUserByRoleAndIsapproved");

//change status of users
Route::get('/updatestatus/{id}', "AdminController@updatestatus");

//get all reported shouts
Route::get('getReportedShouts', "AdminController@getReportedShouts");

//delete reported shouts
Route::get('/deleteReportedShouts/{id}', "AdminController@deleteReportedShouts");

//getAllapprovedUsers
Route::get('getAllloginUsers', "AdminController@getUserByRole");

//delete users
Route::get('/deleteUser/{id}', "AdminController@deleteUser");

//get all posts
Route::get('getAllPosts', "AdminController@getAllPosts");

//delete posts
Route::get('/deletePost/{id}', "AdminController@deletePost");

Route::get('/reject/{id}', "AdminController@reject");
//admin logout
Route::get('/logout', "AdminController@logout");