<?php


namespace App\Http\Controllers;
use Controller;

class ProductController extends Controller 
{ 

    public function __construct() { 
        $this->product = new Controller("Product", "Product");

     }


    public function insert() { 
            
            $database['name'] = 'Maçã';
            $database['description'] = "Melhor fruta";
            $database['nota'] = 5;
        
            $data = array($database);
        
            $msg = "Usuário inserido com sucesso!";
        
        $this->product->insert_values($data, $msg);


    }


    public function store(){ 

    }



}


