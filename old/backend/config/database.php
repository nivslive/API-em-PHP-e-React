<?php

namespace App\Config;

class Connect {

    public $pdo;

    public function __construct() {
        $this->pdo = new PDO(mysql); 
    }
}


