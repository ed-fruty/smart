<?php
namespace Fruty\SmartHome\Exchange\App\Actions\EditExchange;

use Fruty\SmartHome\Exchange\Concern\Contracts\ExchangeInterface;
use Fruty\SmartHome\Exchange\Concern\Contracts\ExchangeRepositoryAwareInterface;
use Fruty\SmartHome\Exchange\Concern\Contracts\ExchangeRepositoryInterface;
use Fruty\SmartHome\Exchange\Concern\Traits\ExchangeRepositoryAware;
use Fruty\SmartHome\Exchange\Concern\ValueObjects\ExchangeId;

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
