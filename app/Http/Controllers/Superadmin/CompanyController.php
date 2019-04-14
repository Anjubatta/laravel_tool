<?php

namespace App\Http\Controllers\Superadmin;

use App\User;
use App\Models\Leaves_types;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Superadmin\CompanyRequest;
use Mail;

class CompanyController extends Controller
{
	const active = 'company';
	const title = 'Company';
	const slug = 'company';

	/**
	* Show the application index.
	*
	* @return \Illuminate\Http\Response
	*/
	public function index()
	{
		$title = array(
			'active' => self::active,
			'title' => self::title,
			'slug' => self::slug
		);
		$company = Company::all();
		return view('superadmin.company.index', compact('title', 'company'));
	}

	/**
	* Show the form for creating a new company.
	*
	* @return \Illuminate\Http\Response
	*/
	public function create()
	{
		$title = array(
			'active' => self::active,
			'title' => self::title,
			'slug' => self::slug
		);
		return view('superadmin.company.create', compact('title'));
	}


	/**
	* Store a newly created resource in storage.
	*
	* @param CompanyRequest $request
	* @return void
	*/
	public function store(CompanyRequest $request)
	{
		$name = $request->name;
		$name = explode(' ', $name);
		$fname = $name[0];
		$lname = @($name[1]) ? $name[1] : '';

		$verify = md5( time() . $request->email);
		//insert into users table
		$user = new User;
		$user->roles_id = 2;
		$user->fname = $fname;
		$user->lname = $lname;
		$user->email = $request->email;
		$user->verify = $verify;
		$user->image = 'avatar.png';
		$user->save();

		//create company
		$date_expired = date("Y-m-d", strtotime("+1 years"));
		$date_expired = date("Y-m-d", strtotime($date_expired."-1 day"));

		$create = new Company;
		$create->super_id = auth()->user()->id;
		$create->users_id = $user->id;
		$create->name = $request->name;
		$create->id_no = $request->id_no;
		$create->information = $request->information;
		$create->address = $request->address;
		$create->image = 'company.jpg';
		$create->subscription_detail = 'basic';
		$create->subscription_payment = 'not-paid';
		$create->subscription_period = '1 years';
		$create->subscription_expired = $date_expired;
		$create->active = $request->active;
		$create->save();
	
		//send email
		self::send_mail($create->id);

		//alert()->success('Success', 'Company '.$create->name.' created!');
		return redirect()->route('superadmin.payment.edit', $create->id);
	}

	/**
	* Show the form for editing the specified resource.
	*
	* @param  \App\Models\Company $company
	* @return \Illuminate\Http\Response
	*/
	public function edit(Company $company)
	{
		$title = array(
			'active' => self::active,
			'title' => self::title,
			'slug' => self::slug
		);
		return view('superadmin.company.edit', compact('title', 'company'));
	}


	/**
	* Update the specified resource in storage.
	*
	* @param CompanyRequest $request
	* @param  \App\Models\Company $company
	* @return \Illuminate\Http\Response
	*/
	public function update(CompanyRequest $request, Company $company)
	{
		$company->update($request->all());
		
		alert()->success('Success', $company->name.' updated!');
		return redirect()->route('superadmin.company.index');
	}

	/**
	* Show the form for show the specified resource.
	*
	* @param  \App\Models\Company $company
	* @return \Illuminate\Http\Response
	*/
	public function show(Company $company)
	{
		$title = array(
			'active' => self::active,
			'title' => self::title,
			'slug' => self::slug
		);
		return view('superadmin.company.show', compact('title', 'company'));
	}

	/**
	* Remove the specified resource from storage.
	*
	* @param Request $request
	* @param  \App\Models\Company $company
	* @return \Illuminate\Http\Response
	* @throws \Exception
	*/
	public function destroy(Request $request, Company $company)
	{
		$request->session()->flash('error', "Company {$company->title} deleted!");
		$company->delete();
		return redirect()->route('superadmin.company.index');
	}


	/**
	* send email to admin account registration
	*
	* @return \Illuminate\Http\Response
	*/
	static function send_mail($company_id){
		$company = Company::find($company_id);
		$user = $company->users;
		$data = array('company'=>$company, 'user'=>$user);
		Mail::send('emails.create_admin', $data, function($message) use($user){
			$message->to($user->email, $user->fname.' '.$user->lname)
			->subject('Registration with Child Care');
		});
	}

}
