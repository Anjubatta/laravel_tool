<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class VerificationController extends Controller
{

	/**
	* Create a new controller instance.
	*
	* @return void
	*/
	public function __construct()
	{
		$this->middleware('guest');
	}

	/**
	* verification users account
	*
	* @param Request $request
	* @return \Illuminate\Http\Response
	*/
	public function verifyUser(Request $request, $email, $token)
	{
		$user = User::whereEmail($email)->whereVerify($token)->first();
		if($user){
			return view('auth.passwords.create', compact('user'));
		}
		//expire link
		alert()->warning('Error', 'Link has been expired!');
		return redirect()->route('login');
	}


	/**
	* Store a newly created resource in storage.
	*
	* @param Request $request
	* @return void
	*/
	public function password(Request $request)
	{
		$user = User::whereEmail($request->email)->whereVerify($request->verify)->first();
		if($user){
			$validatedData = $request->validate([
	            'password' => 'required|string|min:6|confirmed',
	        ]);
			//add user password
			$update = new User;
			$update->exists = true;
			$update->id = $user->id;
			$update->password = Hash::make($request->password);
			$update->active = '1';
			$update->verify = null;
			$update->save();

			alert()->success('Success', 'Your account is activated!');
			return redirect()->route('login');
		}
		//expire link
		alert()->warning('Error', 'Link has been expired!');
		return redirect()->route('login');

	}


}
