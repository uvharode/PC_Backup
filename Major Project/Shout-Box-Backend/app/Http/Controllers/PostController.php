<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {


        $post = new Post();
        $post->user_id = $req->user_id;
        $post->text = $req->text;
        if ($file = $req->hasFile("multimedia")) {
            $file = $req->file("multimedia");
            $fileName = $file->getClientoriginalName();
          
            $whatIWant = substr($fileName, strpos($fileName, ".") + 1);

            $post->type = $whatIWant;

            $destinationpath = public_path() . '/posts/';



            $file->move($destinationpath, $fileName);
            $post->multimedia = '/posts/' . $fileName;
            
        }

        $result = $post->save();

        if ($result) {
            return ["result" => "data saved"];
        } else {
            return ["result" => "operation failed"];
        }
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $post = $user->posts;
        foreach($post as $key=>$value)
        {
            $value->likes;
        }
        return $post;
    }

   

    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
       
        $post->delete();
    }
}