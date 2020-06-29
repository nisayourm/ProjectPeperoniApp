<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $allowedFields = ['email','password'];

    public function addStudent($student)
{ 
    $this->insert([
            'email'=>$student['email'],
            'password'=>$student['password'],
    ]);
}

}

