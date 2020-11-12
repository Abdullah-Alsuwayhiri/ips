<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Role;
use App\Models\User;
use App\Models\Role_user;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class Users_Zone extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $departments = Department::all();
        $roles = Role::all();
        return view('users.add')->with('deps',$departments)->with('roles',$roles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'fname' => 'required',
            'lname' => 'required',
            'username' => 'required',
            'password' => 'required'
          
            //'cover_image' => 'image|nullable|max:1999'
        ]);


         // Create Post
         $user = new User;
         $user->name = $request->input('username');
         $user->fname = $request->input('fname');
         $user->lname = $request->input('lname');
         $user->email = $request->input('email');
         $user->phone = $request->input('contact');
         $pass = Hash::make($request->input('password'));
         $user->password = $pass; 
         
         
         
       //  $user->name = $request->input('username');
         
         
         $user->save();

         $userID = $user->id;
         
         $role = new Role_user;
         $role->role_id = $request->input('role');
         $role->user_id = $userID;
         $role->save();
 
         return back()->withStatus(__('User inserted'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
