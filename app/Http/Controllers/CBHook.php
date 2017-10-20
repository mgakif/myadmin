<?php 
namespace App\Http\Controllers;

use DB;
use Session;
use Request;
use Auth;

class CBHook extends Controller {

	/*
	| --------------------------------------
	| Please note that you should re-login to see the session work
	| --------------------------------------
	|
	*/
	public function afterLogin($login) {
		Auth::attempt($login);
	}
}