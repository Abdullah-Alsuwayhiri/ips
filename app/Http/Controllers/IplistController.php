<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;
use App\Models\Department;
use App\Models\Responsible;
use App\Models\Ipslist;
use App\Models\Project_server;
use App\Models\Type;
use App\Models\Location;
use App\Models\Environment;
use App\Models\Pam;
use App\Models\Guardium;
use App\Models\Sysmon;
use App\Models\Qradar;
use DB;

class IplistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $type = new Type;
        $env = new Environment;
        $location = new Location;

        $types = $type::all();
        $envs = $env::all();
        $locations = $location::all();

        $IPs = Ipslist::all();

        $SERVERS = DB::table('ipslists')->join('locations', 'locations.id', '=', 'ipslists.location_id')->join('environments', 'environments.id', '=', 'ipslists.environment_id')->join('types', 'types.id', '=', 'ipslists.type_id')->select('ipslists.id','ipslists.ip', 'ipslists.title','types.title AS ttitle','environments.title AS etitle','locations.title AS ltitle')->get();
      //  dd($SERVERS);
      //  $belongipswithdetails = DB::table('ipslists')->join('locations', 'locations.id', '=', 'ipslists.location_id')->join('environments', 'environments.id', '=', 'ipslists.environment_id')->join('types', 'types.id', '=', 'ipslists.type_id')->whereIn('ipslists.id', $servers) ->select('ipslists.id','ipslists.ip', 'ipslists.title','types.title AS ttitle','environments.title AS etitle','locations.title AS ltitle')->get();

        return view('servers.index')->with('locations',$locations)->with('envs',$envs)->with('types',$types)->with('servers',$SERVERS);
    }

    public function show($id)
    {
        
        $responsible = new Responsible;

        $projectServer = new Project_server;

        $users = User::all();

        $id = base64_decode($id);

        
        //details about integration systems
        $pams = DB::table('pams')->where('ipslist_id',$id)->pluck('ipslist_id')->toArray();

        if($pams) {
            $hasPam = "Yes";
            $P = json_decode($hasPam);
          //  dd($hasPam);
        }
        else{
            $hasPam = "No";
            $P = json_decode($hasPam);
        }
        $sysmons = DB::table('sysmons')->where('ipslist_id',$id)->pluck('ipslist_id')->toArray();

        if($sysmons) {
            $hasSysmon = "Yes";
            $S = json_decode($hasSysmon);
        }
        else{
            $hasSysmon = "No";
            $S = json_decode($hasSysmon);
        }
        $guardiums = DB::table('guardiums')->where('ipslist_id',$id)->pluck('ipslist_id')->toArray();

        if($guardiums) {
            $hasGuardium = "Yes";
            $G = json_decode($hasGuardium);
        }
        else{
            $hasGuardium = "No";
            $G = json_decode($hasGuardium);
        }
        $qradars = DB::table('qradars')->where('ipslist_id',$id)->pluck('ipslist_id')->toArray();

        if($qradars) {
            $hasQradar = "Yes";
            $Q = json_decode($hasQradar);
        }
        else{
            $hasQradar = "No";
            $Q = json_decode($hasQradar);
            

        }
        
      
        //$thisIP = Ipslist::find($id);
        
        $project_id =  $projectServer::select('project_id')->where('ipslist_id', $id)->first();               //$thisIP->project_server;
        //dd($project_id);

        if (is_null($project_id)) { $owner = null;}
        else {
            $owner = responsible::select('owner','product_manager','tech_manager')->where('project_id', $project_id->project_id)->first();
            $project = Project::select('department_id','title')->where('id',$project_id->project_id)->first();
            $projectName = $project->title;
            $departmentTitle = Department::select('Title')->where('id',$project->department_id)->first();
        
        }


      
    if ($owner) 
      {
        $owner_name = User::select('fname','lname')->where('id',$owner->owner)->first();
        $product_manager = User::select('fname','lname')->where('id',$owner->product_manager)->first();
        $tech_manager = User::select('fname','lname')->where('id',$owner->tech_manager)->first();
        
    
        return view('servers.s_view')->with('G',$hasGuardium)->with('Q',$hasQradar)->with('S',$hasSysmon)->with('P',$hasPam)->with('department',$departmentTitle->Title)->with('projectName',$projectName)->with('sid',$id)->with('users',$users)->with('owner',$owner_name->fname. ' ' .$owner_name->lname)->with('prm',$product_manager->fname. ' ' .$product_manager->lname)->with('techm',$tech_manager->fname. ' ' .$tech_manager->lname);

     
    }
    if (!$owner) 
    {
       
      $owner_name = "";
      $product_name = "";
      $tech_name = "";
    
        return view('servers.s_view')->with('G',$hasGuardium)->with('Q',$hasQradar)->with('S',$hasSysmon)->with('P',$hasPam)->with('sid',$id)->with('users',$users)->with('owner',$owner_name)->with('prm',$product_name)->with('techm',$tech_name);

      
    }

    //return view('servers.server_view');

       
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
    public function env() {
      
        $id = 1;
        $sysmons = DB::table('sysmons')->select('ipslist_id')->pluck('ipslist_id')->toArray();

       $guardiums = DB::table('guardiums')->select('ipslist_id')->pluck('ipslist_id')->toArray();
       $qradars = DB::table('qradars')->select('ipslist_id')->pluck('ipslist_id')->toArray();
      
      
       $type = new Type;
       $env = new Environment;
       $location = new Location;

       $types = $type::all();
       $envs = $env::all();
       $locations = $location::all();

       $IPs = Ipslist::all();

        $ar = array();
        $pams = DB::table('pams')->select('ipslist_id')->pluck('ipslist_id')->toArray();
        $SERVERS = DB::table('ipslists')->join('locations', 'locations.id', '=', 'ipslists.location_id')->join('environments', 'environments.id', '=', 'ipslists.environment_id')->join('types', 'types.id', '=', 'ipslists.type_id')->select('ipslists.id','ipslists.ip', 'ipslists.title','types.title AS ttitle','environments.title AS etitle','locations.title AS ltitle');
       
        
        if($id == 1) {
            $ar = array_merge($ar,$pams);
            

        }
        if($id == 2) {
            $ar = array_merge($ar,$guardiums);

        }
        if($id == 3) {
            $ar = array_merge($ar,$sysmons);

        }
        if($id == 4) {
            $ar = array_merge($ar,$qradars);

        }


        $SERVERS = $SERVERS->whereIn('ipslists.id', $ar);
        $t = $SERVERS->get();

        return view('servers.index')->with('locations',$locations)->with('envs',$envs)->with('types',$types)->with('servers',$t);



    }
    public function add() {

       $type = new Type;
        $env = new Environment;
        $location = new Location;

        $types = $type::all();
        $envs = $env::all();
        $locations = $location::all();
        return view('servers.add')->with('locations',$locations)->with('envs',$envs)->with('types',$types);//->with('deps',$departments)->with('roles',$roles);
    }
    public function filter(Request $request)
    {
        $type = new Type;
       $env = new Environment;
       $location = new Location;

       $types = $type::all();
       $envs = $env::all();
       $locations = $location::all();

       $IPs = Ipslist::all();
        if($request->has('envs'))
        {
            $SERVERS = DB::table('ipslists')->join('locations', 'locations.id', '=', 'ipslists.location_id')->join('environments', 'environments.id', '=', 'ipslists.environment_id')->join('types', 'types.id', '=', 'ipslists.type_id')->select('ipslists.id','ipslists.ip', 'ipslists.title','types.title AS ttitle','environments.title AS etitle','locations.title AS ltitle');


            $queryNumber = $request->input('envs');
            if ($queryNumber == 1) {
                $SERVERS = $SERVERS->where('environment_id', 1);

            }
            $ar = array();
            if ($queryNumber == 2) {
                $pams = DB::table('pams')->select('ipslist_id')->pluck('ipslist_id')->toArray();

                $ar = array_merge($ar,$pams);

            }
            if ($queryNumber == 3) {
                
                //Not in pam
                $pams = DB::table('pams')->select('ipslist_id')->pluck('ipslist_id')->toArray();

                $ar = array_merge($ar,$pams);

                $SERVERS = $SERVERS->whereNotIn('ipslists.id', $ar);

                $t = $SERVERS->get();

                return view('servers.index')->with('locations',$locations)->with('envs',$envs)->with('types',$types)->with('servers',$t);

            }
            if ($queryNumber == 4) {
                // with guardium
                $guardiums = DB::table('guardiums')->select('ipslist_id')->pluck('ipslist_id')->toArray();
                $ar = array_merge($ar,$guardiums);

            }

            if (!empty($ar)) 
            {
                $SERVERS = $SERVERS->whereIn('ipslists.id', $ar);
            }
            $t = $SERVERS->get();

            return view('servers.index')->with('locations',$locations)->with('envs',$envs)->with('types',$types)->with('servers',$t);

        }


       $pam = $request->input('pam');
       $sysmon = $request->input('sysmon');
       $guardium = $request->input('guardium');
       $qradar = $request->input('qradar');


       $envSelected = $request->input('env');
       $typeSelected = $request->input('type');
       $locationSelected = $request->input('location');
    
       

       $ar = array();


       $pams = DB::table('pams')->select('ipslist_id')->pluck('ipslist_id')->toArray();

       $sysmons = DB::table('sysmons')->select('ipslist_id')->pluck('ipslist_id')->toArray();

       $guardiums = DB::table('guardiums')->select('ipslist_id')->pluck('ipslist_id')->toArray();
       $qradars = DB::table('qradars')->select('ipslist_id')->pluck('ipslist_id')->toArray();

     
       

       $SERVERS = DB::table('ipslists')->join('locations', 'locations.id', '=', 'ipslists.location_id')->join('environments', 'environments.id', '=', 'ipslists.environment_id')->join('types', 'types.id', '=', 'ipslists.type_id')->select('ipslists.id','ipslists.ip', 'ipslists.title','types.title AS ttitle','environments.title AS etitle','locations.title AS ltitle');
     
      // dd($SERVERS);
       if($pam) {
           $ar = array_merge($ar,$pams);
          
       // $SERVERS = $SERVERS->whereIn('ipslists.id', $pams);
      

       }
       if($guardium) {
        $ar = array_merge($ar,$guardiums);
       // $SERVERS = $SERVERS->whereIn('ipslists.id', $guardiums);
       }
       if($sysmon) {
           
        $ar = array_merge($ar,$sysmons);

        //dd($ar);
     //   $SERVERS = $SERVERS->whereIn('ipslists.id', $sysmons);
       }
       if($qradar) {
        $ar = array_merge($ar,$qradars);

        //$SERVERS = $SERVERS->whereIn('ipslists.id', $qradars);
       }
       if (!empty($ar)) {
        $SERVERS = $SERVERS->whereIn('ipslists.id', $ar);
   }

        if($envSelected != 0) {
            $SERVERS = $SERVERS->where('environment_id', $envSelected);
        }
        if($typeSelected != 0) {
            $SERVERS = $SERVERS->where('type_id', $typeSelected);
        }
        if($locationSelected != 0) {
            $SERVERS = $SERVERS->where('location_id', $locationSelected);
        }
       $t = $SERVERS->get();
    

       return view('servers.index')->with('locations',$locations)->with('envs',$envs)->with('types',$types)->with('servers',$t);
   

       
       
    }
    public function store(Request $request)
    {
       
        $this->validate($request, [
            'ipv4' => 'required|ip',
            'ip-title' => 'required'
            //'cover_image' => 'image|nullable|max:1999'
        ]);
     


        try {
             // Insert server ip
         $server = new Ipslist;
         $server->ip = $request->input('ipv4');
         $server->title = $request->input('ip-title');
         $server->type_id = $request->input('ip-type');
         $server->environment_id = $request->input('ip-env');
         $server->location_id = $request->input('ip-location');
         
         
         $server->save();

         $lastInsertedID = $server->id;

         //dd($lastInsertedID);
         $hasPam = $request->input('pam');
         $hasSysmon = $request->input('sysmon');
         $hasGuardium = $request->input('guardium');
         $hasQradar = $request->input('qradarin');
        // dd($hasQradar);
       //  $hasQradar = $request->input('qradar');

         //dd($hasPam);
         if($hasPam == 1) {
             $pam = new Pam;
             $pam->ipslist_id = $lastInsertedID;
             //dd($lastInsertedID);
             $pam->save();
           //  $r = $server->pams()->save($server);
             //dd($r);
         }
         if($hasSysmon == 1) {
            $sysmon = new Pam;
            $sysmon->ipslist_id = $lastInsertedID;
            $sysmon->save();
        }
        if($hasGuardium == 1) {
            $guardium = new Guardium;
            $guardium->ipslist_id = $lastInsertedID;
            $guardium->save();
        }
        if($hasQradar == 1) {
            $qradar = new Qradar;
            $qradar->ipslist_id = $lastInsertedID;
            $qradar->save();
        }

         } catch (\Exception $e) { // It's actually a QueryException but this works too
            if ($e->getCode() == 23000) {
                // Deal with duplicate key error  
            }
         }
        
 
         
   

        $id = $request->input('id');
        if ($id == 00){
            return \Redirect::route('servers');
        }
        $eid = base64_encode($id);
        return \Redirect::route('prs.add',[$eid]);
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  

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
       $thisid = $request->input('sid');
       // dd($thisid);

     
       $ip = $request->input('ipv4');
       $title = $request->input('ip-title');
       $type_id = $request->input('ip-type');
       $environment_id = $request->input('ip-env');
       $location_id = $request->input('ip-location');
       
       DB::table('ipslists')
            ->where('id', $thisid)
            ->update(['ip' => $ip,'title' => $title,'type_id' => $type_id,'environment_id' => $environment_id,'location_id' => $location_id]);
      


       $hasPam = $request->input('pam');
       if($hasPam == 0) {
        DB::table('pams')->where('ipslist_id', $thisid)->delete();

       }
       if($hasPam == 1) {

        $pam = Pam::firstOrNew(['ipslist_id' => $thisid]);

        $pam->save();
    
        }

       $hasSysmon = $request->input('sysmon');
       if($hasSysmon == 0) {
        DB::table('sysmons')->where('ipslist_id', $thisid)->delete();

       }
       if($hasSysmon == 1) {

        $sysmon = Sysmon::firstOrNew(['ipslist_id' => $thisid]);

        $sysmon->save();
       }


       $hasGuardium = $request->input('guardium');
       if($hasGuardium == 0) {
        DB::table('guardiums')->where('ipslist_id', $thisid)->delete();

       }
       if($hasGuardium == 1) {

        $gr = Guardium::firstOrNew(['ipslist_id' => $thisid]);

        $gr->save();
       }
      


       $hasQradar = $request->input('qradarin');
       if($hasQradar == 0) {
        DB::table('qradars')->where('ipslist_id', $thisid)->delete();

       }
       if($hasQradar == 1) {

        $qr = Qradar::firstOrNew(['ipslist_id' => $thisid]);

        $qr->save();
       }


       if($id != 0) {
        $EncodedID = base64_encode($id);
        return redirect('project/'. $EncodedID)->with('success', 'IP Server updated');
 
       }
       if($id == 0) {
       
        return redirect('servers')->with('success', 'IP Server updated');
 
       }
       
       

   
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
     
         $del=Ipslist::where('id',$decodingID)->delete();
        
         return redirect('servers')->with('success', 'Server Removed');
    }
}
