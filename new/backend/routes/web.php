

<?php


use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return [
      "title" => "Lumen API com React Frontend by Nivs",
      "msg" => "Feito para elaboração de um teste."];
});

$router->group(['prefix' => 'api'], function () use ($router) {

  $router->get('products/create', ['uses' => 'ProductController@create']);
  $router->get('products/run',  ['uses' => 'ProductController@run']);

  $router->get('products',  ['uses' => 'ProductController@index']);

  $router->get('products/all',  ['uses' => 'ProductController@all']);

  $router->get('products/{id}', ['uses' => 'ProductController@showOne']);


  $router->post('products/create', ['uses' => 'ProductController@create']);

  $router->delete('products/{id}', ['uses' => 'ProductController@delete']);


  $router->get('delete-all-products', ['uses' => 'ProductController@deleteAll']);

  $router->put('products/{id}', ['uses' => 'ProductController@update']);
});