<?php
use Fruty\SmartHome\Exchange\App\Actions\GetExchangeList\GetExchangeListAction;
use Illuminate\Routing\Router;

/** @var \Illuminate\Routing\Router $router */

$router->group(['prefix' => 'exchange'], function(Router $router) {

    $router->get('/')
        ->uses(GetExchangeListAction::class)
        ->name(GetExchangeListAction::ROUTE_NAME);

});