<?php
require_once '../config/database';


namespace App\Models;

use  App\Config\Connect;

class Models {

    public array $data = [];

    public function insert_values(array ...$table, array ...$data,   string $msg = '') {

        try {

            $tables = [];

            foreach ($table as $key => $t) {
                $tables[] = $t[$key]. ",";
            }

            $sql  = "INSERT INTO produtos(".$tables.") VALUES (? , ? , ?) ";

           //CASO FOR USAR SENHA
           // $senha = md5();

            $bd = $this->pdo->prepare($sql);

            foreach($data as $row => $d){
            $bd->bindParam($row, $d); } 
        
        $bd->execute();

        return $msg;


    }
   
   
    catch(PDOException $e){     return $e->getMessage(); }
        



    public function getAll(array $data) {
        $sql = "SELECT * FROM".$data;

        $bd = $this->pdo->prepare($sql);
        $bd->execute();

    

    while ($row = $bd->fetch(PDO::FETCH_OBJ))  {   
                    if($row) return $row;    
                
                }

    return array("Não há dado");
            }
            
}
