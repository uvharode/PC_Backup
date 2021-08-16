<?php

namespace App\Http\Controllers;
use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
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

    public function LikePost(Request $request)
    {
        $user_id=$request->user_id;
        $post_id=$request->post_id;
       
        
        $likedpost=Like::where('user_id',$user_id)->where('post_id',$post_id)->where('liked',1)->get();
        $count=count($likedpost);
        
        if($count === 1)
        {
            
        Like::where('user_id',$user_id)->where('post_id',$post_id)->delete();

        }
        else{
        $like=new Like();
        $like->user_id=$user_id;
        $like->post_id=$post_id;
        $like->save();
        $like=Like::where('user_id',$user_id)->where('post_id',$post_id)->update(['liked' => true]);
        
        }
     
    }

  
    
}
