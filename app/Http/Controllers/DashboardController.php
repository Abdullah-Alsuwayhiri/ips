<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Environment;

use DB;
class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //return view('dashboard');
        $data = DB::table('ipslists')->join('environments', 'environments.id', '=', 'ipslists.environment_id')->select(DB::raw('environments.title as env'),
        DB::raw('count(*) as number'))
        ->groupBy('env')
        ->get();
        $array[] = ['Env', 'Number'];
        foreach($data as $key => $value)
        {
          $array[++$key] = [$value->env, $value->number];
        }
       
        //return view('google-pie-chart')->with('course', json_encode($array));

        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        return view('dashboard')->with('envs', json_encode($array));
    }
}
