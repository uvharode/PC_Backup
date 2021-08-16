<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    function display($id)
    {
        $user = User::find($id);
        return response()->json($user);
    }

    function login(Request $request)
    {
       

        $user = User::where('email', $request->email)->first();

       
        if ($user) {

            if ((!$user || !Hash::check($request->password, $user->password))) {
                return response()->json(["message" => "invalid", 'error' => 'invalid  Credential']);
            }
            if (!$user->isapproved) {
                return response()->json(["message" => "Not approved", "error" => "asdfasdfnjasjkdf"]);
            }
           
            if ($user->role == "admin") {
                return response()->json(["message" => "Not user", "error" => "Not user"]);
            }
        } else {
            return response()->json(["message" => "invalid", 'error' => 'invalid  Credential']);
        }

        return response()->json($user);
    }

    function register(Request $request)
    {
        $credentials = $request->all();
        $credentials['password'] = Hash::make($credentials['password']);
        $user = User::create($credentials);
       
        return response()->json($user);
    }

    public function logout(Request $request)
    {
        request()->session()->regenerate(true);
        request()->session()->flush();
        return redirect('/login');
    }
}


