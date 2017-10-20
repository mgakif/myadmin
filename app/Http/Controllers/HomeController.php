<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use URL;

class HomeController extends BaseController
{

    public function homepage(){
    	$context = $this->get_context_data();
    	return view('homepage',compact('context'));

    }
    public function yasemin(){
    	return 0;
    }
}
