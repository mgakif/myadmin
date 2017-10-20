<?php

namespace App\Http\Controllers;

use App\Models\Flower;
use Illuminate\Http\Request;

class yaseminController extends Controller
{
    public function topla($a,$b){
    	return $a+ $b;
    }
    public function aboutus(){
    	return view('about');
	}

	public function contact(){
    	return view('contact');
	}
	public function flowers(){
		$flowers = Flower::all();
		$adlar = ['mehmet','yasemin','emre','rumeysa'];
    	return view('flower.flowers',compact('flowers','adlar'));
	}
}
