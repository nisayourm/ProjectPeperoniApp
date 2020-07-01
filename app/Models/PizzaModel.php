<?php namespace App\Models;

use CodeIgniter\Model;

class PizzaModel extends Model
{
    protected $table      = 'peperoni';
    protected $primaryKey = 'id';
    protected $returnType     = 'array';
    protected $allowedFields = ['name', 'prize', 'ingredients'];   

    public function createPizza($pizza) 
    {
        $this->insert([
            'name'=>$pizza['name'],
            'prize'=>$pizza['prize'],
            'ingredients'=>$pizza['ingredients']
        ]);
    }
}