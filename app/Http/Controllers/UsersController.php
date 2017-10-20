<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Validator;
use Auth;
use Redirect;
use Crudbooster;

class UsersController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function signInForm()
	{
			$context = $this->get_context_data();
			return view('user.signIn', compact('context'));
	}

	public function signIn(Request $request)
	{
			$postData = $request->all();
			$rules = array(
				'email' => 'required|email',
				'password' => 'required'
			);
			$messages = array(
				'email.required' => 'Lütfen mail adresinizi yazın',
				'email.email' => 'Lütfen geçerli bir mail adresi yazın',
				'password.required' => 'Lütfen şifrenizi yazın'
			);
			$validator = Validator::make($postData, $rules, $messages);
			if ($validator->fails()) {
				return Redirect::route('signInForm')
											 ->withInput()
											 ->withErrors($validator->messages());
			} else {
				$login = array(
					'email' => $postData['email'],
					'password' => $postData['password']
				);
				$errors = array(
					'Girdiğiniz mail adresi veya şifre hatalı!'
				);
				if (Auth::attempt($login)){
					return redirect(CRUDBooster::adminPath());
				} else {
					return Redirect::route('signInForm')->withInput()->withErrors($errors);
				}
			}
	}

	public function logout()
    {
        Auth::logout();
        return Redirect::route('signInForm');
    }
}
