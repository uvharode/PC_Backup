<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;

use Illuminate\Support\Collection;

class FriendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getAllUsers($id)
    {
        $user_id=$id;
        $users = User::all();
        //getting all user except logged in user
        $allusers = $users->except($user_id);
       
        $all=$allusers->where('role','user');
        //getting friends of that users
        $friends=User::find($user_id)->friends()->get();

        //primary keys of that users
        $keys=$friends->modelKeys();
       
        //getting users which are not in friends_user table
        $finalusers = $all->except($keys);
        
        return $finalusers;
    }

    public function getFriendsPosts($id){

        $friends=User::find($id)->friends()->wherePivot('isfriend',1)->get();
        $keys=$friends->modelKeys();
        $posts=Post::whereIn('user_id',$keys)->latest()->get();
        
        $postArr = [];

        foreach ($posts as $key => $value) {
              $value->user;
        }

        foreach ($posts as $key => $value) {
            $value->likes;
      }
       
        
        return $posts;

        }
       
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addFriend(Request $request)
    {
       $user_id=$request->user_id;
       $friend_id=$request->friend_id;
        
        $friend=User::find($friend_id)->friends()->wherePivot('friend_id',$user_id)->get();
        $count=count($friend);

        if($count === 1)
        {
          
        }
        else{
      
        

        $friend = User::find($friend_id);       
        $friend->friends()->attach($user_id);

    
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function acceptRequest(Request $request)
    {
        $user_id=$request->user_id;
       $friend_id=$request->friend_id;

       $friend = User::find($friend_id);       
       $friend->friends()->attach($user_id);

        

       $user = User::find($user_id); 
       $user->friends()->updateExistingPivot($friend_id,[
           'isfriend' => true,
       ]);

       $friend = User::find($friend_id); 
       $friend->friends()->updateExistingPivot($user_id,[
           'isfriend' => true,
       ]);
   
    }

    public function rejectRequest($user_id,$friend_id)
    {
       
  
      
        error_log($user_id);
        $friend = User::find($friend_id);       
         $friend->friends()->detach($user_id);

        $user = User::find($user_id); 
        $user->friends()->detach($friend_id);
        
       
    }
    public function allAcceptedFriends($id)
    {
        $accepted=User::find($id)->friends()->wherePivot('isfriend',1)->get();
        
        return $accepted;
       

    }

    public function allPendingRequest($id)
    {
        
        $pending=User::find($id)->friends()->wherePivot('isfriend',0)->get();
        
       
        return $pending;
        

    }


    public function isFriend($user_id,$friend_id)
    {
    
        $friend=User::find($user_id)->friends()->wherePivot('isfriend',1)->wherePivot('friend_id',$friend_id)->get();
       
        return $friend;
       
    }
   
}
