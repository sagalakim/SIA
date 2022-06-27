<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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
    return $router->app->version();
});


$router->group(['middleware' => 'client.credentials'],function() use ($router) {

    //DATABASE 1
$router->get('/dbs1books', 'Dbs1BookController@index');
$router->post('/dbs1books', 'Dbs1BookController@add');
$router->get('/dbs1books/{id}', 'Dbs1BookController@show');
$router->put('/dbs1books/{id}', 'Dbs1BookController@update');
$router->delete('/dbs1books/{id}', 'Dbs1BookController@delete'); 

$router->get('/dbs1authors', 'Dbs1AuthorController@index');
$router->post('/dbs1authors', 'Dbs1AuthorController@add');
$router->get('/dbs1authors/{id}', 'Dbs1AuthorController@show');
$router->put('/dbs1authors/{id}', 'Dbs1AuthorController@update');
$router->delete('/dbs1authors/{id}', 'Dbs1AuthorController@delete');

});