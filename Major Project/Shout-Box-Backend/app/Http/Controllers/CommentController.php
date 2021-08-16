<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;


class CommentController extends Controller
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {
        $comment = new Comment();
        $comment->user_id = $req->user_id;
        $comment->post_id = $req->post_id;
        $comment->text = $req->text;
        $comment->name = $req->name;
        $result = $comment->save();



        if ($result) {
            return $result;
        } else {
            return ["result" => "operation failed"];
        }
    }

   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     **/

    public function show($id)
    {
        $post = Post::find($id);
        return $post->comments;
    }

    
}