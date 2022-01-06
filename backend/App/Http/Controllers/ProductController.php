<?php


namespace App\Http\Controllers;
use Controller;

//OPCIONAL USAR O USE AQUI.
//JÁ ESTÁ INSTANCIADO NO CONTROLLER O REQUEST E O RESPONSE

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;


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


    function get_products($product_id=0)
	{
		global $connection;
		$query="SELECT * FROM products";
		if($product_id != 0)
		{
			$query.=" WHERE id=".$product_id." LIMIT 1";
		}
		$response=array();
		$result=mysqli_query($connection, $query);
		while($row=mysqli_fetch_array($result))
		{
			$response[]=$row;
		}
		header('Content-Type: application/json');
		echo json_encode($response);
	}


    function insert_product()
	{
		global $connection;
		$product_name=$_POST["product_name"];
		$price=$_POST["price"];
		$quantity=$_POST["quantity"];
		$seller=$_POST["seller"];
		$query="INSERT INTO products SET product_name='{$product_name}', price={$price}, quantity={$quantity}, seller='{$seller}'";
		if(mysqli_query($connection, $query))
		{
			$response=array(
				'status' => 1,
				'status_message' =>'Product Added Successfully.'
			);
		}
		else
		{
			$response=array(
				'status' => 0,
				'status_message' =>'Product Addition Failed.'
			);
		}
		header('Content-Type: application/json');
		echo json_encode($response);
	}




    function update_product($product_id)
	{
		global $connection;
		parse_str(file_get_contents("php://input"),$post_vars);
		$product_name=$post_vars["product_name"];
		$price=$post_vars["price"];
		$quantity=$post_vars["quantity"];
		$seller=$post_vars["seller"];
		$query="UPDATE products SET product_name='{$product_name}', price={$price}, quantity={$quantity}, seller='{$seller}' WHERE id=".$product_id;
		if(mysqli_query($connection, $query))
		{
			$response=array(
				'status' => 1,
				'status_message' =>'Product Updated Successfully.'
			);
		}
		else
		{
			$response=array(
				'status' => 0,
				'status_message' =>'Product Updation Failed.'
			);
		}
		header('Content-Type: application/json');
		echo json_encode($response);
	}

}


    function update_product($product_id)
	{
		global $connection;
		parse_str(file_get_contents("php://input"),$post_vars);
		$product_name=$post_vars["product_name"];
		$price=$post_vars["price"];
		$quantity=$post_vars["quantity"];
		$seller=$post_vars["seller"];
		$query="UPDATE products SET product_name='{$product_name}', price={$price}, quantity={$quantity}, seller='{$seller}' WHERE id=".$product_id;
		if(mysqli_query($connection, $query))
		{
			$response=array(
				'status' => 1,
				'status_message' =>'Product Updated Successfully.'
			);
		}
		else
		{
			$response=array(
				'status' => 0,
				'status_message' =>'Product Updation Failed.'
			);
		}
		header('Content-Type: application/json');
		echo json_encode($response);
	}







    public function show(){ 

    }


    public function edit(){

    }


    public function delete() { 
        
    }

}


