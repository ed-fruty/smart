<?php
namespace Fruty\SmartHome\Exchange\App\Actions\UpdateExchange;

use Fruty\SmartHome\Common\Http\Redirect\Aware\RedirectAware;
use Fruty\SmartHome\Common\Http\Redirect\Contracts\RedirectAwareInterface;
use Fruty\SmartHome\Common\Http\Response\Contracts\ResponseBuilderAwareInterface;
use Fruty\SmartHome\Common\Http\Response\Traits\ResponseBuilderAware;
use Fruty\SmartHome\Exchange\App\Transformers\ExchangeResourceTransformer;
use Fruty\SmartHome\Exchange\Concern\Contracts\ExchangeInterface;

class UpdateExchangeResponder implements ResponseBuilderAwareInterface
{
    use ResponseBuilderAware;

    private const REDIRECT_ROUTE = 'exchange.index';

    /**
     * @param ExchangeInterface $exchange
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getResponse(ExchangeInterface $exchange)
    {
        return $this->responseBuilder
            ->json($exchange, new ExchangeResourceTransformer)
            ->redirect('exchange.index')
            ->flash('Exchange was updated.')
            ->build();
    }
}
