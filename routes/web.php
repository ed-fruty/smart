<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/** @var \Illuminate\Routing\Router $router */

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

$router->resources([
    'exchange'  => 'ExchangeController',
    'device'    => 'DeviceController',
    'command'   => 'DeviceCommandController',
]);


$router->get('/go/{project}', function($project) {
    return redirect()->to('/');
});