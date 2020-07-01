<?php namespace App\Controllers;
use App\Models\PizzaModel;
class Pizza extends BaseController
{
	public function viewsPizza()
	{
        $data = [];
		helper(['form']);
        $pizza = new PizzaModel();
        $data['pizzas'] = $pizza->findAll();
		return view('index', $data);
	}

    public function addPizza()
	{
		$data = [];
		helper(['form']);

		if($this->request->getMethod() == 'post'){

			$rules = [
				'name' => 'required',
				'prize' => 'required',
				'ingredients' => 'required'
			];

			if(!$this->validate($rules)){
				$data['validation'] = $this->validator; 
			}else{
				$pizza = new PizzaModel();
				$newData = [
					'name' =>$this->request->getVar('name'),
					'prize' =>$this->request->getVar('prize'),
					'ingredients' =>$this->request->getVar('ingredients'),
				];

				$pizza->createPizza($newData);
				$session = session();
				$session->setFlashdata('success', 'Successful Registration!!!');
				return redirect()->to('index');
			}
		}

		return view('index', $data);
	}

    public function deletePizza($id)
    {
        $pizza = new PizzaModel();
        $pizza->delete($id);
        return redirect()->to('/index');
    }

    public function updatePizza()
	{
		$pizza = new PizzaModel();
        $pizza->update($_POST['id'],$_POST);
		return redirect()->to('/index');
	}
	
	//--------------------------------------------------------------------
}
