<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\BioController;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;

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

//friend api
//get all friends
Route::get('/accepted/{id}', [FriendController::class,'allAcceptedFriends']);
//get all pending requests
Route::get('/pending/{id}', [FriendController::class,'allPendingRequest']);
//add friend
Route::post('addfriend', [FriendController::class,'addFriend']);
//get people you may know
Route::get('/userlist/{id}', [FriendController::class,'getAllUsers']);
//accept request
Route::post('acceptrequest', [FriendController::class,'acceptRequest']);
//remove friend
Route::delete('/removefriend/{user_id}/{friend_id}', [FriendController::class,'rejectRequest']);

//route for isfriend
 Route::get('/isfriend/{user_id}/{friend_id}', [FriendController::class,'isFriend']);

 //get post of friends
 Route::get('/friendsposts/{id}', [FriendController::class,'getFriendsPosts']);



//routes for like
Route::post('/like', [LikeController::class,'LikePost']);


 //routes for bio
//get bio of user
 Route::get('/getbio/{id}', [BioController::class,'getBioOfUser']);
 //update bio
 Route::post('/updatebio/{id}', [BioController::class,'updateBio']);

 //--------------------------------------------------------------------
 //post api
//get post of user
Route::get("posts/{id}", [PostController::class, 'show']);
//post shouts
Route::post("add", [PostController::class, 'create']);
//delete shouts
Route::get("delete/{id}", [PostController::class, 'destroy']);

//----------------------------------------------------------------------
//report api

Route::post('/isReported', 'ReportController@isReported');

//routes for login and registration

Route::get("display/{id}", [UserController::class, 'display']);
Route::post("login", [UserController::class, 'login']);
Route::post("register", [UserController::class, 'register']);
Route::get("logout", [UserController::class, 'logout']);

//routes for login and comment
Route::post("addcomment", [CommentController::class, 'create']);
Route::get("showComment/{id}", [CommentController::class, 'show']);