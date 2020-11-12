<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});


Route::get('/about', function () {
    return view('pages.about');
});*/
Auth::routes();

Route::get('/home', [App\Http\Controllers\DashboardController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\DashboardController@index')->name('home');





Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::get('upgrade', function () {return view('pages.upgrade');})->name('upgrade');
	 Route::get('map', function () {return view('pages.maps');})->name('map');
	 Route::get('icons', function () {return view('pages.icons');})->name('icons');
	 Route::get('table-list', function () {return view('pages.tables');})->name('table');
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);

	//Cards
    Route::get('total_accounts', function () {return view('Cards_view.total_accounts');})->name('total_accounts');
    Route::get('total_pam_accounts', function () {return view('Cards_view.total_pam_accounts');})->name('total_pam_accounts');
    Route::get('total_production_servers', function () {return view('Cards_view.total_production_servers');})->name('total_production_servers');
    Route::get('servers_without_pam', function () {return view('Cards_view.servers_without_pam');})->name('servers_without_pam');


    //Sections
    Route::get('section/Infrastructure', function () {return view('Cards_view.total_production_servers');})->name('section/Infrastructure');



    Route::get('NCA_Requiremnts/nca', function () {return view('NCA_Requiremnts.NCA');})->name('nca');

    Route::get('/adduser','App\Http\Controllers\Users_Zone@index');
    Route::put('users', ['as' => 'user.add', 'uses' => 'App\Http\Controllers\Users_Zone@store']);

    Route::get('/organization','App\Http\Controllers\Organization@index')->name('organization');


    Route::get('organization/{id}/edit', ['as' => 'department.edit', 'uses' => 'App\Http\Controllers\Organization@edit']);
    //Route::get('organization/{id}/edit', ['as' => 'department.edit', 'uses' => 'App\Http\Controllers\Organization@edit']);

    Route::put('organization', ['as' => 'department.add', 'uses' => 'App\Http\Controllers\Organization@store']);
    Route::put('organization/{id}', ['as' => 'department.update', 'uses' => 'App\Http\Controllers\Organization@update']);
    Route::get('organization/{site}/delete', ['as' => 'department.delete', 'uses' => 'App\Http\Controllers\Organization@destroy']);


    Route::get('/project','App\Http\Controllers\ProjectController@index')->name('project');


    Route::get('project/{id}/edit', ['as' => 'project.edit', 'uses' => 'App\Http\Controllers\ProjectController@edit']);
    //Route::get('organization/{id}/edit', ['as' => 'department.edit', 'uses' => 'App\Http\Controllers\Organization@edit']);

    Route::put('project', ['as' => 'project.add', 'uses' => 'App\Http\Controllers\ProjectController@store']);

    Route::put('project/{id}', ['as' => 'project.update', 'uses' => 'App\Http\Controllers\ProjectController@update']);

    Route::get('/project/{id}', 'App\Http\Controllers\ProjectController@show');
    Route::get('/project/{id}', ['as' => 'prs.add', 'uses' => 'App\Http\Controllers\ProjectController@show']);

    //Route::get('project/view','App\Http\Controllers\ProjectController@show');

    //Adding Managers To project
    Route::put('project', ['as' => 'managers.add', 'uses' => 'App\Http\Controllers\ProjectManagersController@store']);
    Route::get('project/{site}/delete', ['as' => 'project.delete', 'uses' => 'App\Http\Controllers\ProjectController@destroy']);

    //update servers associated with a project
    Route::put('projectServers/{id}', ['as' => 'projectServers.update', 'uses' => 'App\Http\Controllers\ProjectServersController@update']);

    Route::put('IplistController', ['uses' => 'App\Http\Controllers\IplistController@store', 'as' => 'create.ip']);
    Route::put('IplistController/{id}', ['as' => 'update.ip', 'uses' => 'App\Http\Controllers\IplistController@update']);

    //Route::get('project/fetch', ['as' => 'server.fetch', 'uses' => 'App\Http\Controllers\ProjectController@populate']);
    Route::get('populate/{id}', 'App\Http\Controllers\ProjectController@populate');

    Route::get('/name/{id}','App\Http\Controllers\ProjectController@populate')->name('name');

    Route::get('project_server/{site}/delete', ['as' => 'project_server.delete', 'uses' => 'App\Http\Controllers\ProjectServersController@destroy']);


    //servers list
    Route::get('/servers','App\Http\Controllers\IplistController@index')->name('servers');
    Route::get('/servers/{id}', 'App\Http\Controllers\IplistController@show');

    Route::put('/servers', ['uses' => 'App\Http\Controllers\IplistController@filter', 'as' => 'filter.servers']);

    Route::get('/addserver','App\Http\Controllers\IplistController@add');

  //  Route::put('/servers', ['uses' => 'App\Http\Controllers\IplistController@env', 'as' => 'env.servers']);

    
    Route::get('servers/{site}/delete', ['as' => 'servers.delete', 'uses' => 'App\Http\Controllers\IplistController@destroy']);


});




Route::post('project', ['as' => 'project.add', 'uses' => 'App\Http\Controllers\ProjectController@store']);
Route::put('project', ['as' => 'managers.add', 'uses' => 'App\Http\Controllers\ProjectManagersController@store']);


Route::get('/','App\Http\Controllers\PagesController@index');
Route::get('/about','App\Http\Controllers\PagesController@about');
Route::get('/services','App\Http\Controllers\PagesController@services');

Route::resource('posts','App\Http\Controllers\PostsController');
Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index']);
