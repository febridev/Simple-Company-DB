<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Session;
use Auth;
use DB;



class usermanagement extends Controller
{
    //
    public function login()
    {
    	return view('user.login');
    }

    public function authenticate(Request $request)
	{	
		if(Input::has('username') && Input::has('password'))
		{
			$username = $request->input('username');
			$password = $request->input('password');
			if(Auth::attempt(['username'=> $username,'password' => $password],true))
			{
				return redirect()->route('userhome');
			}else{
				Session::flash('error_msg_flash','username atau password tidak cocok');
				return redirect()->intended('/');
			}
		}else{
			Session::flash('error_msg_flash','silakan mengisi username dan password secara lengkap dan benar');
			return redirect()->intended('/');
		}
		
	}

	public function logout()
	{
		if(Auth::check())
		{
			Auth::logout();		
			return redirect()->intended('/');
		}else 
		{
			return redirect()->intended('/');
		}
	}

}
