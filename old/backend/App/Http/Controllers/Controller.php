<?php

namespace App\Http\Controllers;
use App\Models\Repositories\Model;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class Controller { 



    protected object $controller;
    protected object $model;
    protected $request;
    protected $response;


    public function __contruct($controller, $model){
        $this->controller = new $controller;
        $this->model = new $model;
        $this->request = new Request;
        $this->response = new Response;
    }



}