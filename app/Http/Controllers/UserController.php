<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {


        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        $users =  User::all();
       // $users = User::where('id', '!=', auth()->id())->get();         
      // return view('users.index', compact('users'));

       return view('users.index')->with('users',$users)->with('thisuser', $user);
        //return view('users.index')->with($users);
    }

    


   

}
