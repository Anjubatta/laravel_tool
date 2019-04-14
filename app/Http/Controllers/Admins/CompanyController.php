<?php

namespace App\Http\Controllers\Admins;

use App\User;
use App\Models\Company;
use App\Models\Leaves_types;
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
		
			$use = auth()->user();
					
		$company = Company::whereId($use->companies->id)->first();
		return view('admin.company.show', compact('title', 'company'));
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
		return view('admin.company.edit', compact('title', 'company'));
	}

	/**
	* Update the specified resource in storage.
	*
	* @param CompanyRequest $request
	* @param  \App\Models\Company $company
	* @return \Illuminate\Http\Response
	*/
	public function update(Request $request, Company $company)
	{
	
		$company->update($request->all());
			
		alert()->success('Success', $company->name.' updated!');
		return redirect()->route('admin.company.index');
	}

}
