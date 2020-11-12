<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project_server;
use DB;
class ProjectServersController extends Controller
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
        //
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
       // dd($request);

       //Firstly, delete all assigned ips to this project
       DB::table('project_servers')->where('project_id', $id)->delete();

       if($request->has('location_right')) {

        foreach( $request['location_right'] as $value ){


            DB::table('project_servers')->insert([
                ['project_id' => $id, 'ipslist_id' => $value]
            ]);
            DB::table('ipslists')
                ->where('id', $value)
                ->update(['taken' => 1]);
      
           }
       }

       if($request->has('location_left')) {

        foreach( $request['location_left'] as $value ){


            //dd($value);
         
            DB::table('ipslists')
                ->where('id', $value)
                ->update(['taken' => 0]);
      
           }
       }
      
       

       $eid = base64_encode($id);
       return \Redirect::route('prs.add',[$eid]);

      // return view('project');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prid = Project_server::select('project_id')->where('ipslist_id',$id)->first();


        $res=Project_server::where('ipslist_id',$id)->delete();

  

        $eid = base64_encode($prid->project_id);
    
      //    dd($eid);
          return redirect('project/'. $eid)->with('success', 'Server removed');
       //   return redirect('/project')->with('success', ' Removed');
    }
}
