<?php namespace App\Controllers;
use App\Models\UserModel;
class User extends BaseController
{
	public function index()
	{
		$data = [];
		helper(['form']);

		if($this->request->getMethod() == 'post'){
			// set the roule for email and password
			$rules = [
				'email' => 'required|valid_email',
				'password' => 'required',
			];

			$errors = [
				'password' => [
					'validateUser' => 'you don\t have account yet|| Please Register'
				]
			];
				// validation form
			if(!$this->validate($rules, $errors)){
				$data['validation'] = $this->validator; 
			}else{
				$model = new UserModel();

				$user = $model->where('email',$this->request->getVar('email'))->first();
				$user = $model->where('password', $this->request->getVar('password'))->first();
				$this->setUserSession($user);
				return redirect()->to('/index');
			}
		}

		return view('login', $data);
	}
	//--------------------------------------------------------------------


	public function setUserSession($user){

		$data = [
			'id' => $user['id'],
			'email' => $user['email'],
			'address' => $user['address'],
			'role' =>  $user['role'],
			'isLoggedIn' => true
		];

		session()->set($data);
		return true;
	}
    
    // register the user to databast

    public function register()
	{
		$data = [];
		helper(['form']);

		if($this->request->getMethod() == 'post'){

			$rules = [
				'email' => 'required|valid_email',
				'password' => 'required',
				'address' => 'required'
			];

			if(!$this->validate($rules)){
				$data['validation'] = $this->validator; 
			}else{
				$model = new UserModel();

				$addData = [
					'email' =>$this->request->getVar('email'),
					'password' =>$this->request->getVar('password'),
					'address' =>$this->request->getVar('address'),
				];

				$model->createUser($addData);
				$session = session();
				$session->setFlashdata('success', 'Successful Registration!!!');
				return redirect()->to('/');
			}
		}

		return view('register', $data);
	}
	// user logout
	public function logout()
	{
		section()->destroy();
		return redirect()->to('/');
	}

}
