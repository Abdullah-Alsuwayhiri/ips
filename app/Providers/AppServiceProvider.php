<?php

namespace App\Providers;
use App\Models\Ipslist;
use App\Models\Pam;

use DB;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      //  $countPR = DB::table('ipslists')->where('environment_id', 1)->count();

        view()->composer(
            'layouts.headers.cards',
            function ($view) {
                $view->with('cpr', DB::table('ipslists')->where('environment_id', 1)->count());
                $view->with('cpam', DB::table('pams')->count());


                $allservers = Ipslist::pluck('id')->all();
                $collection = collect($allservers);
                $pam = Pam::whereIn('ipslist_id', $allservers)->count();
                $serversWithoutPam = $collection->count() - $pam;
                $view->with('cnopam', $serversWithoutPam);

                $view->with('cguardium', DB::table('guardiums')->count());

                $data = DB::table('ipslists')->join('environments', 'environments.id', '=', 'ipslists.environment_id')->select(DB::raw('environments.title as env'),
                 DB::raw('count(*) as number'))
                ->groupBy('env')
                ->get();
                $array[] = ['Env', 'Number'];
                foreach($data as $key => $value)
                {
                $array[++$key] = [$value->env, $value->number];
                }

                $view->with('envs', json_encode($array));


                
            }
        );
    }
}
