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


//BOOKS
$router->get('/books', 'BookController@index');
$router->post('/books', 'BookController@add');
$router->get('/books/{id}', 'BookController@show');
$router->put('/books/{id}', 'BookController@update');
$router->delete('/books/{id}', 'BookController@delete'); 

//AUTHORS
$router->get('/authors', 'AuthorController@index');
$router->post('/authors', 'AuthorController@add');
$router->get('/authors/{id}', 'AuthorController@show');
$router->put('/authors/{id}', 'AuthorController@update');
$router->delete('/authors/{id}', 'AuthorController@delete'); 
