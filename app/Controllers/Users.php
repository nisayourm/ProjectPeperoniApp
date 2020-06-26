<?php namespace App\Controllers;

class Users extends BaseController
{
	public function index()
	{
		return view('auths/login');		
	}
	//Register
	public function register()
	{
		return view('auths/register');		
	}
	// SIGN IN INSTEAD

	public function signInInstead()
	{
		return view('index');		
	}
}
