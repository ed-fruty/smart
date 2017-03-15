<?php
namespace App\SmartHome\Exchange\App\Actions\DeleteExchange;

use App\SmartHome\Common\Http\Redirect\Aware\RedirectAware;
use App\SmartHome\Common\Http\Redirect\Contracts\RedirectAwareInterface;
use App\SmartHome\Exchange\Concern\Contracts\ExchangeInterface;
use Illuminate\Http\JsonResponse;

class DeleteExchangeResponder implements RedirectAwareInterface
{
    use RedirectAware;

    const REDIRECT_ROUTE = 'exchange.index';

    /**
     * @param ExchangeInterface $exchange
     * @return \Illuminate\Http\RedirectResponse|JsonResponse
     */
    public function getResponse(ExchangeInterface $exchange)
    {
        if ($this->request->ajax()) {
            return new JsonResponse($exchange);
        }

        //$this->flash->message()->deleted($exchange->getName());

        return $this->redirect->route(self::REDIRECT_ROUTE);
    }
}
