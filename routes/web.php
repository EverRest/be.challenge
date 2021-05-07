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
$router->group(['namespace' => 'History'], function () use ($router) {
    $router->get('/history/users/{id:[0-9]+}[/domains/{domain_id:[0-9]+}]', [
        'as' => 'history.users.list', 'uses' => 'HistoryController@listUsersHistory'
    ]);
});
