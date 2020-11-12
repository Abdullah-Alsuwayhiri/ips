<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use DB;
//defined('BASEPATH') OR exit('No direct script access allowed');
class Organization extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $dep = Department::all();

        return view('organization.index')->with('departments',$dep);
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
            'department' => 'required'
          
            //'cover_image' => 'image|nullable|max:1999'
        ]);


         // Create Post
         $org = new Department;
         $org->Title = $request->input('department');
         
         
         $org->save();
 
         return back()->withStatus(__('Department inserted'));
        // return redirect('/organization')->with('success', 'Department has been inserted');
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
       // $user = User::find($id);
    // Load user/createOrUpdate.blade.php view
   // return View::make('user.createOrUpdate')->with('user', $user);


        $dep =  Department::all();
        $d =  Department::find($id);
       // return view('posts.edit')->with('post', $post);
        return view('organization.index')->with('dep_edit',$d)->with('departments',$dep);
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
        $dep = Department::find($id);
        $dep->Title = $request->input('department');
       // $post->body = $request->input('body');
        
        //$post->user_id = auth()->user()->id;
        //$post->cover_image = $fileNameToStore;
        $dep->save();

        return redirect('/organization')->with('success', 'Department Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $decodingID = base64_decode($id);
     
       
        //Put all associated ips in an array to change taken column value 
        $projects = DB::table('projects')->where('department_id', '=', $decodingID)->pluck('id')->toArray();

       
        foreach($projects as $value) {
           
            $servers = DB::table('Project_servers')->where('project_id', '=', $value)->pluck('ipslist_id')->toArray();

             // Update taken to 0, in order to be available for assign 
            $allprojectserver = DB::table('ipslists')->whereIn('id', $servers)->update(['taken' => 0]);
 
        }
        
   
        


        $del=Department::where('id',$decodingID)->delete();
       
        return redirect('organization')->with('success', 'Department Removed');
    }

    public function Projects()
    {
        return $this->hasMany('App\Models\Project');
    }
}
