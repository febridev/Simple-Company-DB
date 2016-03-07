<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Session; 
use Mail;


class contactus extends Controller
{
    //
	public function index()
	{
		return view('user.contactus');
	}

	public function Send_Mail(Request $request)
    {
        if(Input::has('username') && Input::has('useremail') && Input::has('usermessage'))
        {
            $username = $request->username;
            $useremail = $request->useremail;
            $usermessage = $request->usermessage;

            Mail::send( 'mail.emptymailtemplate' ,array('emailbody' => $usermessage,
                'emailuser' => $useremail ,'emailname' => $username ), function ($message) use ($useremail,$username) {
                //$message->from($useremail, $username);
                $message->to(env('EmailAccepter', 'tls'),$name=env('EmailName', 'tls'));
                //$message->bcc('noreplyjendelaberita@gmail.com',$name='Jendela Berita');
                $message->getSwiftMessage();
            });
            Session::flash('success_msg','terima kasih .email anda akan di balas dalam 24 jam');
            return redirect()->route('contactusindex');
        }else{
            Session::flash('error_msg','silakan mengisi dengan lengkap');
            return redirect()->route('contactusindex');
        }
    }


}
