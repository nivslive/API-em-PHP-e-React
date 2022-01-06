<?php

namespace App\Http\Controllers;
use App\Models\Repositories\Model;

class Controller { 


    protected object $controller;
    protected object $model;

    public function __contruct($controller, $model){
        $this->controller = new $controller;
        $this->model = new $model;
    }



}