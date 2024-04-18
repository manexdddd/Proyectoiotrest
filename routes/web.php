<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use App\Http\Middleware\ExampleMiddleware;
use Flipbox\LumenGenerator\Console\MiddlewareMakeCommand;


$router->get('/', function () use ($router) {
    //return $router->app->version();
     return "Hola mundo";
});
$router->post('login','AuthController@login');


function recurso($router,$url,$modelo){

    $router -> get("$url",$modelo."Controller@index");

    $router ->get("$url/{id}",$modelo."Controller@show");
    
    $router ->post("$url",$modelo."Controller@store");
    $router ->put("$url/{id}",$modelo."Controller@update");
    $router ->delete("$url/{id}",$modelo."Controller@destroy");
}

$router->group(['middlewere'=>'auth'],function()use($router){
recurso($router,'users','User');
recurso($router,'sensors','Sensors');
recurso($router,'actuators','Actuators');
});
