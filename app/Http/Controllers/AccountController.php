<?php
use Illuminate\Http\Request;

class AccountController extends BaseController {
	public function get_details(){
		if (Auth::check()){
		$context = $this->get_context_data();
		$account = User::find(Auth::user()->id)->account()->first();
		return View::make('account_detail',compact('account','context'));
	}
	return Redirect::to('frontlogin');
	}
	public function signUpForm(){
    	if (Auth::check())
    		return Redirect::route('frontlogin');
		$context = $this->get_context_data();
		return View::make('account_detail',compact('account','context'));
	}
	public function save(){
		if (Auth::check()){
		$data = Input::all();
		$rules = array(
            'f_name_1'  => 'required',
            'l_name_1'  => 'required',
            'code_1'  => 'required|numeric|digits:5',
            'phone_1' => 'required',
            'email_1' => 'required|email',
            'address_1' => 'required',
            'city_1' => 'required',
            'country_1' => 'required',
            
        );
		$validator = Validator::make($data, $rules);
		 if ($validator->fails()){
            $url = URL::route('editaccount');
            Session::flash('message', 'Lutfen Bilgilerinizi Eksiksiz Doldurunuz');
            return Redirect::to($url)->withInput()->withErrors($validator);
        }

		$context = $this->get_context_data();
		$account = Account::where('user_id', '=', Auth::user()->id)->first();
        if (!$account) {
                // insert
                $account = new Account;
            }

        $account->user_id=Auth::user()->id;
 		$account->first_name= trim($data['f_name_1']);
		$account->middle_name= trim($data['m_name_1']);
		$account->last_name= trim($data['l_name_1']);
		$account->postcode= trim($data['code_1']);
		$account->email = trim($data['email_1']);
		$account->phone = trim($data['phone_1']);
		$account->address_line1 = trim($data['address_1']);
		$account->address_line2 = trim($data['address_1_1']);
		$account->city = trim($data['city_1']);
		$account->country = trim($data['country_1']);
        $account->save();
		return View::make('account_detail',compact('account','context'));
	}
	return Redirect::to('frontlogin');;
	}
	public function signUp(){
		
		$data = Input::all();
		$rules = array(
            'f_name_1'  => 'required',
            'l_name_1'  => 'required',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6',
            'phone_1' => 'required',
            'email_1' => 'required|email|unique:users,email',
            'address_1' => 'required',
            'city_1' => 'required',
            'country_1' => 'required',
            'aggree' => 'required',
            
        );
        $messages = array(
        	    'f_name_1.required' => '*',
	            'l_name_1.required'  => '*',
	            'password.required' => '*',
	            'phone_1.required' => '*',
	            'email_1.required' => '*',
	            'address_1.required' => '*',
	            'city_1.required' => '*',
                'aggree.required' => 'Üye olabilmek için kullanım koşullarını kabul etmeniz gerekmektedir.',
	            'country_1.required' => '*',
				'email_1.unique' => 'Bu mail adresi kullanılmaktadır',
				'email_1.email' => 'Geçerli bir mail adresi girin',
				'password.confirmed' => 'Şifreler eşleşmiyor'
			);
		$validator = Validator::make($data, $rules, $messages);
		 if ($validator->fails()){
            $url = URL::route('editaccount');
            Session::flash('message', 'Lutfen Bilgilerinizi Eksiksiz Doldurunuz');
            return Redirect::back()->withInput()->withErrors($validator->messages());
        }

		$context = $this->get_context_data();
		$user= new User();
 		$user->name= trim($data['f_name_1']).' '.trim($data['l_name_1']);
 		$user->email= trim($data['email_1']);
		$user->password = $data['password'];
		$user->token = str_random(10);
		$user->save();
		$data['token'] = $user->token;
		$this->email($data);
		$account = new Account;
		$account->user_id = User::where('email',trim($data['email_1']))->first()->id;
		$account->first_name= trim($data['f_name_1']);
		$account->last_name= trim($data['l_name_1']);
		$account->middle_name= trim($data['tc']);
		$account->postcode= trim($data['code_1']);
		$account->email = trim($data['email_1']);
		$account->phone = trim($data['phone_1']);
		$account->address_line1 = trim($data['address_1']);
		$account->city = trim($data['city_1']);
		$account->country = trim($data['country_1']);
		$account->save();
                $tebrik = "Tebrikler, hesabınız kaydedildi. Giriş Yapabilmeniz için email adresinizin doğrulanması gerekiyor $account->email hesabına doğrulama maili yolladık. Lütfen hesabınızı kontrol ediniz. Lütfen Bulk ya da Spam klasörüne de bakınız.";
		return Redirect::back()->with('message',$tebrik);
	
	}
	
	public function email($data){
    	Mail::send('emails.createuser', compact('data'), function ($message) use($data){
        $message->to($data['email_1'], 'İktisat Mektebi')->subject('Hoşgeldiniz');
        });
	}
	public function confirm($token)
    {
        $user = User::wheretoken($token)->first();
        if (!$user)
        	return redirect()->route('frontlogin')->with('message','Hesap bulunamadı ya da süresi dolmuş');
        $user->confirmed = 1;
        $user->token = str_random(10);
        $user->save();

        return redirect()->route('frontlogin')->with('message','E-mailiniz doğrulandı');
    }
}