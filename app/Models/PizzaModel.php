<?php namespace App\Models;

use CodeIgniter\Model;

class PizzaModel extends Model
{
    protected $table      = 'peperoni';
    protected $primaryKey = 'id';
    protected $returnType     = 'array';
    protected $allowedFields = ['name','ingredients','price'];   
    // insert data
    public function createPizza($pizza) 
    {
        $this->insert([
            'name'=>$pizza['name'],
            'price'=>$pizza['price'],
            'ingredients'=>$pizza['ingredients']
        ]);
    }
}