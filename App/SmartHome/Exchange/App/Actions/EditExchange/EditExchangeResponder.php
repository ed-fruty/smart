<?php
namespace App\SmartHome\Exchange\App\Actions\EditExchange;

use App\SmartHome\Common\View\Contracts\ViewFactoryAwareInterface;
use App\SmartHome\Common\View\Traits\ViewFactoryAware;
use App\SmartHome\Exchange\Concern\Contracts\ExchangeInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Response;

class EditExchangeResponder implements ViewFactoryAwareInterface
{
    use ViewFactoryAware;

    const VIEW_NAME = 'exchange.edit';

    /**
     * @param ExchangeInterface|null $exchange
     * @return Response
     */
    public function getResponse($exchange)
    {
        if (! $exchange) {
            throw new ModelNotFoundException("Exchange was not found");
        }

        return new Response(
              $this->viewFactory->make(self::VIEW_NAME, compact('exchange'))
        );
    }
}
