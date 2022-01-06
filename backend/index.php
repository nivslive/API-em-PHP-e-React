<?php

use App\Http\Controllers\ProductController;
use App\Models\Model;


use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

// Instantiate App
$app = AppFactory::create();

// Add error middleware
$app->addErrorMiddleware(true, true, true);


//initialize Controller Functions
$ProductController = new ProductController;

// Add routes


$app->get('/', function () {   $productController->index();});
$app->get('/', function () {   $productController->insert();});


$app->get('/hello/{name}', function (Request $request, Response $response, $args) {
    $name = $args['name'];
    $response->getBody()->write("Hello, $name");
    return $response;
});

$app->run();
