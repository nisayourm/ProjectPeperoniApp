<?php namespace App\Controllers;
use App\Models\PizzaModel;
class Pizza extends BaseController
{
	// for viewPizza
	public function viewsPizza()
	{
        $data = [];
		helper(['form']);
        $pizza = new PizzaModel();
        $data['pizzas'] = $pizza->findAll();
		return view('index', $data);
	}

	// add pizza to databast
    public function addPizza()
	{
		$data = [];
		helper(['form']);

		if($this->request->getMethod() == 'post'){

			$rules = [
				'name' => 'required',
				'price' => 'required',
				'ingredients' => 'required'
			];

			if(!$this->validate($rules)){
				$data['validation'] = $this->validator; 
			}else{
				$pizza = new PizzaModel();
				$newData = [
					'name' =>$this->request->getVar('name'),
					'price' =>$this->request->getVar('price'),
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
	// delete pizza
    public function deletePizza($id)
    {
        $pizza = new PizzaModel();
        $pizza->delete($id);
        return redirect()->to('/index');
    }
	// edit pizza
    public function edit($id)
	{
		$pizza = new PizzaModel();
        $data['edit'] = $pizza->find($id);
		return view('index',$data); 
	}


	// udate pizza
    public function updatePizzs()
	{
		$pizza = new PizzaModel();
        $pizza->update($_POST['id'],$_POST);
		return redirect()->to('/index');
	}
	
	//--------------------------------------------------------------------
}
