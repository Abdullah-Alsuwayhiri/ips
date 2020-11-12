<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{

 

    
    public function index() {
       
       //return 'ind';
        return view('pages.index');
    }
    public function about() {
        return view('pages.about');
    }
    public function services() {
        $data = array(
            'services' => ['web design', 'programming','bot']
        );
        return view('pages.services')->with($data);
        
    }
}
