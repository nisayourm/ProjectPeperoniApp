<?php namespace App\Controllers;
use App\Models\PizzaModel;
class Pizza extends BaseController
{
	public function listPizzas()
	{
		$users = new PizzaModel();
		// // $users-> insert($data);
		// $listPeperoni['peperoniList'] = $users->findAll();
		return view('index');		
	}

	
}