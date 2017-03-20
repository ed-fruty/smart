<?php
namespace Fruty\SmartHome\Exchange\App\Actions\CreateExchange;

use Fruty\SmartHome\Exchange\App\Transformers\ExchangeResourceTransformer;
use Fruty\SmartHome\Exchange\Concern\Contracts\ExchangeInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Fruty\SmartHome\Common\Http\Response\Contracts\ResponseBuilderAwareInterface;
use Fruty\SmartHome\Common\Http\Response\Traits\ResponseBuilderAware;

class CreateExchangeResponder implements ResponseBuilderAwareInterface
{
    use ResponseBuilderAware;

    const REDIRECT_ROUTE = 'exchange.index';

    /**
     * @param ExchangeInterface $exchange
     * @return Response|RedirectResponse
     */
    public function getResponse(ExchangeInterface $exchange)
    {
        return $this->responseBuilder
            ->json($exchange, new ExchangeResourceTransformer)
            ->redirect(self::REDIRECT_ROUTE)
            ->build();
    }
}
