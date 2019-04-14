<?php

namespace App\Http\Controllers\Superadmin;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
	const active = 'reports';
	const title = 'Payments';
	const slug = 'payment';

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
		return view('superadmin.payment.index', compact('title', 'company'));
	}

	/**
	* Show the form for editing the specified resource.
	*
	* @param  \App\Models\Company $payment
	* @return \Illuminate\Http\Response
	*/
	public function edit(Company $payment)
	{
		$title = array(
			'active' => self::active,
			'title' => self::title,
			'slug' => self::slug
		);
		return view('superadmin.payment.edit', compact('title', 'payment'));
	}
	
	/**
	* Update the specified resource in storage.
	*
	* @param Request $request
	* @param  \App\Models\Company $payment
	* @return \Illuminate\Http\Response
	*/
	public function update(Request $request, Company $payment)
	{
		$payment->update($request->all());
		alert()->success('Success', 'Company '.$payment->name.' updated!');
		return redirect()->route('superadmin.payment.index');
	}

	/**
	* Show the form for show the specified resource.
	*
	* @param  \App\Models\Company $payment
	* @return \Illuminate\Http\Response
	*/
	public function show(Company $payment)
	{
		$title = array(
			'active' => self::active,
			'title' => self::title,
			'slug' => self::slug
		);
		return view('superadmin.payment.show', compact('title', 'payment'));
	}

	/**
	* Update the specified resource in storage.
	*
	* @param Request $request
	* @param  \App\Models\Company $payment
	* @return \Illuminate\Http\Response
	*/
	public function renew(Request $request, Company $payment)
	{
		$update = new Company;
		$update->exists = true;
		$update->id = $payment->id;
		$update->auto_renew = ($payment->auto_renew=='1') ? '0' : '1';
		$update->save();
		
		alert()->success('Success', 'Company '.$payment->name.' auto renew updated!');
		return redirect()->route('superadmin.payment.show', $payment->id);
	}

}
