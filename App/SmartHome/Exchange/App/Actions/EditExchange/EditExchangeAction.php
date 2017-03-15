<?php
namespace App\SmartHome\Exchange\App\Actions\EditExchange;

use App\SmartHome\Exchange\Concern\Contracts\ExchangeInterface;
use App\SmartHome\Exchange\Concern\Contracts\ExchangeRepositoryAwareInterface;
use App\SmartHome\Exchange\Concern\Contracts\ExchangeRepositoryInterface;
use App\SmartHome\Exchange\Concern\Traits\ExchangeRepositoryAware;
use App\SmartHome\Exchange\Concern\ValueObjects\ExchangeId;

class EditExchangeAction implements ExchangeRepositoryAwareInterface
{
    use ExchangeRepositoryAware;

    /**
     * @param EditExchangeRequest $request
     * @param EditExchangeResponder $responder
     * @param $exchangeId
     * @return \Illuminate\Http\Response
     */
    public function __invoke(EditExchangeRequest $request, EditExchangeResponder $responder, $exchangeId)
    {
        $exchange = $this->exchangeRepository->findById(new ExchangeId($exchangeId));

        return $responder->getResponse($exchange);
    }
}
