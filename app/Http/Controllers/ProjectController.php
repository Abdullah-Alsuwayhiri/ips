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
use Auth;
use DB;
class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
     
  
            $this->middleware('admin');
    }
    public function index()
    {

        $projects = Project::all();

        $id = auth()->user()->id;
        $userRoles = Auth::user()->roles->pluck('name');
        //$user = User::find($id);

        $deps = Department::all();

      //  $belongipswithdetails = DB::table('ipslists')->join('locations', 'locations.id', '=', 'ipslists.location_id')->join('environments', 'environments.id', '=', 'ipslists.environment_id')->join('types', 'types.id', '=', 'ipslists.type_id')->whereIn('ipslists.id', $servers) ->select('ipslists.id','ipslists.ip', 'ipslists.title','types.title AS ttitle','environments.title AS etitle','locations.title AS ltitle')->get();

        return view('project.index')->with('projects',$projects)->with('user_type',$userRoles)->with('departments',$deps);
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
            'protitle' => 'required'
          
            //'cover_image' => 'image|nullable|max:1999'
        ]);


         // Create Post
         $org = new Project;
         $org->title = $request->input('protitle');
         $org->department_id = $request->input('prodepartment');
         
         $org->save();
 
         return back()->withStatus(__('Project inserted'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $type = new Type;
        $env = new Environment;
        $location = new Location;

        $types = $type::all();
        $envs = $env::all();
        $locations = $location::all();


        $org = new Project;
        $allprojects = $org::all();
        $responsible = new Responsible;

        //$servers = new Project_server;
        //$listofipsid = servers::select('ipslist_id')->where('project_id', $id)->get();
        //dd($servers);

        $id = base64_decode($id);
        //return 'this is id ' .$id;
        $users = User::all();

        $thisproject = $org::find($id);

       $owner = responsible::select('owner','product_manager','tech_manager')->where('project_id', $id)->first();
       $departments = Department::all();
       // dd($owner);
       //::where('name','=',$name)
       $allip = Ipslist::where('taken',0)->get();
       //dd($allip);
       //$AllIPs = ips

     
       $allprojectserver = DB::table('Project_servers')->join('ipslists', 'project_servers.ipslist_id', '=', 'ipslists.id')->where('project_id', '=', $id) ->select('ipslists.id', 'ipslists.ip')->get();


    //dd($id);
       // $servers = new Project_server;
        $servers = DB::table('Project_servers')->where('project_id', '=', $id)->pluck('ipslist_id')->toArray();
      // $s = $servers->ipslist->id;
       //dd($servers);

      
     
      //if(!$servers->isEmpty()) {
      if(!empty($servers)) {
        $belongipswithdetails = DB::table('ipslists')->join('locations', 'locations.id', '=', 'ipslists.location_id')->join('environments', 'environments.id', '=', 'ipslists.environment_id')->join('types', 'types.id', '=', 'ipslists.type_id')->whereIn('ipslists.id', $servers) ->select('ipslists.id','ipslists.ip', 'ipslists.title','types.title AS ttitle','environments.title AS etitle','locations.title AS ltitle')->get();
       // dd($belongipswithdetails);
      }

      // dd($allprojectserver);
      // $allprojectserver = Project_server::all();
       //dd($allprojectserver);
      if ($owner) 
      {
        $owner_name = User::select('fname','lname')->where('id',$owner->owner)->first();
        $product_manager = User::select('fname','lname')->where('id',$owner->product_manager)->first();
        $tech_manager = User::select('fname','lname')->where('id',$owner->tech_manager)->first();
        
        if(!empty($servers)) {
            return view('project.project_view')->with('locations',$locations)->with('envs',$envs)->with('types',$types)->with('ipsdetials',$belongipswithdetails)->with('allprojectserver',$allprojectserver)->with('ips',$allip)->with('departments',$departments)->with('allprojects',$allprojects)->with('thisproject',$thisproject)->with('users',$users)->with('prid',$id)->with('owner',$owner_name->fname. ' ' .$owner_name->lname)->with('prm',$product_manager->fname. ' ' .$product_manager->lname)->with('techm',$tech_manager->fname. ' ' .$tech_manager->lname);

        }
        else {
            return view('project.project_view')->with('locations',$locations)->with('envs',$envs)->with('types',$types)->with('ipsdetials','')->with('allprojectserver',$allprojectserver)->with('ips',$allip)->with('departments',$departments)->with('allprojects',$allprojects)->with('thisproject',$thisproject)->with('users',$users)->with('prid',$id)->with('owner',$owner_name->fname. ' ' .$owner_name->lname)->with('prm',$product_manager->fname. ' ' .$product_manager->lname)->with('techm',$tech_manager->fname. ' ' .$tech_manager->lname);

        }

    }
      if (!$owner) 
      {
        $owner_name = "";
        $product_name = "";
        $tech_name = "";
        if(!empty($servers)) {
            return view('project.project_view')->with('locations',$locations)->with('envs',$envs)->with('types',$types)->with('ipsdetials',$belongipswithdetails)->with('allprojectserver',$allprojectserver)->with('ips',$allip)->with('departments',$departments)->with('allprojects',$allprojects)->with('thisproject',$thisproject)->with('users',$users)->with('prid',$id)->with('owner',$owner_name)->with('prm',$product_name)->with('techm',$tech_name);

        }
        else {
            return view('project.project_view')->with('locations',$locations)->with('envs',$envs)->with('types',$types)->with('ipsdetials','')->with('allprojectserver',$allprojectserver)->with('ips',$allip)->with('departments',$departments)->with('allprojects',$allprojects)->with('thisproject',$thisproject)->with('users',$users)->with('prid',$id)->with('owner',$owner_name)->with('prm',$product_name)->with('techm',$tech_name);

        }
      }
       
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sid = $id;
       // dd($sid);
        echo json_encode($sid);
    }

    public function populate($id)
    {
       
        $server_id = $id;
        //$ip_detail = Ipslist::where('id',$server_id)->get();
        $ip = Ipslist::select('ip','title','type_id','environment_id','location_id',)->where('id', $server_id)->first();
       
           //count gardium with current server
           $gn =  DB::table('guardiums')->where('ipslist_id', '=', $server_id)->first();
        
           $gr = 0;
           if (is_null($gn)) {
            $gr = 0;
            } else {
                $gr = 1;
            }
          
            $pn =  DB::table('pams')->where('ipslist_id', '=', $server_id)->first();
        
            $pr = 0;
            if (is_null($pn)) {
             $pr = 0;
             } else {
                 $pr = 1;
             }

             $sn =  DB::table('sysmons')->where('ipslist_id', '=', $server_id)->first();
        
             $sr = 0;
             if (is_null($sn)) {
              $sr = 0;
              } else {
                  $sr = 1;
              }

              $qn =  DB::table('qradars')->where('ipslist_id', '=', $server_id)->first();
        
              $qr = 0;
              if (is_null($qn)) {
               $qr = 0;
               } else {
                   $qr = 1;
               }
          
     
        return response()->json(['serverID' => $server_id, 'cqradar' => $qr,'csysmon' => $sr,'cpam' => $pr,'cguardium' => $gr, 'ip'=>$ip->ip,'title' => $ip->title,'typeid' => $ip->type_id,'env' => $ip->environment_id,'location' => $ip->location_id]);

        //return response()->json(['cguardium' => $withGuardium,'cpam' => $withPam,'csysmon' => $withSysmon,'cqradar' => $withQradar,'ip'=>$ip->ip,'title' => $ip->title,'typeid' => $ip->type_id,'env' => $ip->environment_id,'location' => $ip->location_id]);
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
        $this->validate($request, [
            'protitle' => 'required',
            'prodepartment' => 'required'
            //'cover_image' => 'image|nullable|max:1999'
        ]);
       
         $pro = Project::find($id);
         $pro->title = $request->input('protitle');
         $pro->department_id = $request->input('prodepartment');
         
         //$post->user_id = auth()->user()->id;
        // $pro->touch();

         $pro->save();
 
         $eid = base64_encode($id);
         //Redirect::to('settings/photos?image_='. $image_);
         return redirect('project/'. $eid)->with('success', 'Project Updated');

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
        $servers = DB::table('Project_servers')->where('project_id', '=', $decodingID)->pluck('ipslist_id')->toArray();
       
  
        // Update taken to 0, in order to be available for assign 
        $allprojectserver = DB::table('ipslists')->whereIn('id', $servers)->update(['taken' => 0]);

       
        
        $del=Project::where('id',$decodingID)->delete();
       
        return redirect('project')->with('success', 'Project Removed');

       
    }

   
    public function ips(Request $request, $id)
    {
       
         return redirect('project/'. $eid)->with('success', 'Post Updated');

    }
}
