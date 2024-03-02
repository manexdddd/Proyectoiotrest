<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use App\Http\Middleware\ExampleMiddleware;
use Flipbox\LumenGenerator\Console\MiddlewareMakeCommand;

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
    //return $router->app->version();
     return "Hola mundo";
});
$router->post('login','AuthController@login');


function recurso($router,$url,$modelo){

    $router -> get("$url",$modelo."Controller@index");

    $router ->get("$url/{id}",$modelo."Controller@show");
    
    $router ->post("$url",$modelo."Controller@store");
    $router ->put("$url/{id}",$modelo,"Controller@update");
    $router ->delete("$url/{id}","$modelo,Controller@destroy");
}

$router->group(['middlewere'=>'auth'],function()use($router){
recurso($router,'users','Users');
recurso($router,'sensors','Sensors');
recurso($router,'actuators','Actuators');
});
