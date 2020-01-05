<?php

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

$router->get('/clothing', 'ClotheByUserController@index');
$router->post('/clothing', 'ClotheByUserController@store');
$router->delete('/clothing/{clothes}', 'ClotheByUserController@destroy');
$router->put('/clothing/{clothes}', 'ClotheByUserController@update');
$router->get('/clothing/{clothes}', 'ClotheByUserController@show');
