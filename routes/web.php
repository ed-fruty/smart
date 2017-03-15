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

use Fruty\SmartHome\Exchange\App\Actions\GetExchangeList\GetExchangeListAction;
use Illuminate\Routing\Router;

Route::get('/', function () {
    return view('welcome');
});


/** @var \Illuminate\Routing\Router $router */

$router->group(['prefix' => 'exchange'], function(Router $router) {

    $router->get('/')
        ->uses(GetExchangeListAction::class)
        ->name(GetExchangeListAction::ROUTE_NAME);

});