<?php namespace App\Controllers;
use App\Models\PizzaModel;
class Pizza extends BaseController
{
	public function listPizza()
	{
		$users = new PizzaModel();
		// $users-> insert($data);
		$listPeperoni['peperoniList'] = $users->findAll();
		return view('index',$listPeperoni);		
	}

	public function addPizza()
	{
		$data = [];
		if($this->request->getMethod() == "post"){
			helper(['form']);
			$rules = [
				'name'=>'required',
				'ingredient'=>'required',
				'price'=>'required|min_length[1]|max_length[50]',
			];
				$pizzaModel = new PizzaModel();
				$pizzaName = $this->request->getVar('name');
				$pizzaIngredient = $this->request->getVar('ingredient');
				$pizzaPrice = $this->request->getVar('price')."$";
				$pizzaData = array(
					'name'=>$pizzaName,
					'ingredient'=>$pizzaIngredient,
					'price'=>$pizzaPrice,
				);
				$pizzaModel->insert($pizzaData);
		}
		return redirect()->to('/listPizza');
	}

	
}