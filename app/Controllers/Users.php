<?php namespace App\Controllers;

class Users extends BaseController
{
	//login
	public function index()
	{
		$data = [];
		helper(['form']);
		return view('auths/login');		
	}
	//Register
	public function register()
	{
		return view('auths/register');		
	}
	// SIGN IN INSTEAD


}