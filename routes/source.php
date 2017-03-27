<?php
use Fruty\SmartHome\Exchange\App\Actions\CreateExchange\CreateExchangeAction;
use Fruty\SmartHome\Exchange\App\Actions\DeleteExchange\DeleteExchangeAction;
use Fruty\SmartHome\Exchange\App\Actions\GetCreateExchangeForm\GetCreateExchangeFormAction;
use Fruty\SmartHome\Exchange\App\Actions\GetExchangeEditForm\GetExchangeEditFormAction;
use Fruty\SmartHome\Exchange\App\Actions\GetExchangeList\GetExchangeListAction;

use Fruty\SmartHome\Exchange\App\Actions\UpdateExchange\UpdateExchangeAction;
use Illuminate\Routing\Router;

/** @var \Illuminate\Routing\Router $router */

$router->group(['prefix' => 'exchange'], function(Router $router) {

    $router->get('/')
        ->uses(GetExchangeListAction::class)
        ->name(GetExchangeListAction::ROUTE_NAME);

    $router->get('create')
        ->uses(GetCreateExchangeFormAction::class)
        ->name(GetCreateExchangeFormAction::ROUTE_NAME);

    $router->post('store')
        ->uses(CreateExchangeAction::class)
        ->name(CreateExchangeAction::ROUTE_NAME);

    $router->get('edit/{exchangeId}')
        ->uses(GetExchangeEditFormAction::class)
        ->name(GetExchangeEditFormAction::ROUTE_NAME);

    $router->patch('update/{exchangeId}')
        ->uses(UpdateExchangeAction::class)
        ->name(UpdateExchangeAction::ROUTE_NAME);

    $router->delete('delete/{exchangeId}')
        ->uses(DeleteExchangeAction::class)
        ->name(DeleteExchangeAction::ROUTE_NAME);
});