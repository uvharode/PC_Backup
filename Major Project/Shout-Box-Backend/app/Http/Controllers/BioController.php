<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Bio;

class BioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    
    public function updateBio(Request $req,$id)
    {
        
        $user_id=$id;
        $user = User::find($user_id);
       
        if($user->bio === null)
        {
        $bio = new Bio;
        $bio->work = $req->work;
        $bio->college = $req->college;
        $bio->school = $req->school;
        $bio->location = $req->location;
        $bio->native_place = $req->native_place;
        $user->bio()->save($bio);
        }
        else{
        $user->bio->work = $req->work;
        $user->bio->college = $req->college;
        $user->bio->school = $req->school;
        $user->bio->location = $req->location;
        $user->bio->native_place = $req->native_place;
        $user->push();
        }
       
    }

    public function getBioOfUser($id)
    {
        $bio = User::find($id)->bio()->get();
        
        return $bio;
    }
    
}
