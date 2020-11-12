<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Responsible;

class ProjectManagersController extends Controller
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
        $this->validate($request, [
            'pro' => 'required',
            'prm' => 'required',
            'prt' => 'required'
          
            //'cover_image' => 'image|nullable|max:1999'
        ]);


         // Create Post
         $manager = new Responsible;
        // $manager->project_id = $request->input('id');
        // $manager->owner = $request->input('pro');
        // $manager->product_manager = $request->input('prm');
        // $manager->tech_manager = $request->input('prt');
        $rr =  $request->input('id');
         $user = Responsible::updateOrCreate(['project_id' => $rr], 
            ['owner' => $request->input('pro'),
            'product_manager' => $request->input('prm'),
            'tech_manager' => $request->input('prt')
            

        ]);
        return back()->withStatus(__('Managers inserted'));


       //  if (Responsible::where('project_id', '=', $request->input('id'))->count() > 0) {
        //    $this->performUpdate($manager);
       //     return back()->withStatus(__('Managers inserted'));
      //   }
         
         
       //  $manager->save();
 
        // return back()->withStatus(__('Managers inserted'));
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
