<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use Facade\FlareClient\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function adminView()
    {
        return view('admin');
    }
    function adminlogin(Request $request)
    {

        $request->validate([
            'email' => 'required | email',
            'password' => 'required',
        ], [
            'email.required' => 'Email is required',
            'password.required' => 'password is required',

        ]);

         $user = User::where('email', $request->email)->first();

        if ($user->role == "user") {
            return response('Oppes! You are not a authenticated user');
        }
         if ((!$user || !Hash::check($request->password, $user->password))) {
            return response('Oppes! You have entered invalid credentials');
        } else {
            $users = User::all()->where('role', 'user')->where('isapproved', '0');
            return view('home', ['layout' => 'getUserByRoleAndIsapproved', 'users' => $users]);
        }

        return $user;
    }


    public function session_show(Request $request, $id)
    {
    }

    public function logout(Request $request)
    {
        request()->session()->regenerate(true);
        request()->session()->flush();
        return redirect('');
    }


    //admin functionality:

    public function getUserByRole()
    {
        $users = User::all()->where('role', 'user')->where('isapproved', '1');

        return view('home', ['users' => $users, 'layout' => 'getUserByRole']);
    }



    public function getUserByRoleAndIsapproved()
    {
        $users = User::all()->where('role', 'user')->where('isapproved', '0');

        return view('home', ['users' => $users, 'layout' => 'getUserByRoleAndIsapproved']);
    }




    public function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/getAllloginUsers');


    }


    public function updatestatus($id)
    {
        $user = User::find($id)->update(['isapproved' => 1]);

        return redirect('/home');
    }


    public function reject($id)
    {
        $user = User::find($id)->delete();
  return redirect('/home');
    }



    //----------------Posts------------------------------------

    public function getAllPosts()
    {
        $users = DB::table('posts')
            ->join('users', 'posts.user_id', '=', 'users.id')

            ->select('posts.*', 'users.firstname', 'users.lastname')
            ->get();
         return view('home', ['users' => $users, 'layout' => 'getAllPosts']);
    }



    public function deletePost($id)
    {
        $post = Post::find($id);
       $post->delete();
        return redirect('/getAllPosts');
    }


    //-------------------Report-----------------

    public function getReportedShouts()
    {
        $users = DB::table('posts')
            ->join('reports', 'posts.id', '=', 'reports.post_id')
            ->join('users', 'users.id', '=', 'posts.user_id')
            ->select('posts.*', 'reports.issue', 'users.firstname', 'users.lastname','reports.user_id')
            ->get();
         return view('home', ['users' => $users, 'layout' => 'getReportedShouts']);
    }


    public function deleteReportedShouts($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect('/getReportedShouts');


    }

   
}
