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

$router->group([
    'prefix' => '/api/v1/cron',
    'middleware' => 'auth.basic:api,id'
], function () use ($router) {
    $router->get('/', 'Api\CronController@index');
    $router->get('/{id}', 'Api\CronController@show');
    $router->post('/', 'Api\CronController@store');
    $router->put('/{id}', 'Api\CronController@update');
    $router->delete('/{id}', 'Api\CronController@destroy');

});
