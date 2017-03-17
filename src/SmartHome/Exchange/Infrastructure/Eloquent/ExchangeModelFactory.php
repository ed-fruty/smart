<?php
namespace Fruty\SmartHome\Exchange\Infrastructure\Eloquent;

use Fruty\SmartHome\Exchange\Concern\Contracts\ExchangeInterface;
use Fruty\SmartHome\Exchange\Concern\Contracts\ExchangeModelFactoryInterface;
use Fruty\SmartHome\Exchange\Concern\Contracts\WriteExchangeInterface;
use Fruty\SmartHome\Exchange\Infrastructure\Eloquent\WriteExchange;

class ExchangeModelFactory implements ExchangeModelFactoryInterface
{
    /**
     * @param array $attributes
     * @return ExchangeInterface
     */
    public function createReadExchange(array $attributes = []): ExchangeInterface
    {
        return new Exchange($attributes);
    }

    /**
     * @param array $attributes
     * @return ExchangeInterface
     */
    public function hydrate(array $attributes = []): ExchangeInterface
    {
        return (new Exchange)->forceFill($attributes);
    }

    /**
     * @param ExchangeInterface $exchange
     * @return WriteExchangeInterface
     */
    public function createWriteExchange(ExchangeInterface $exchange): WriteExchangeInterface
    {
        /** @var Exchange $exchange */
        return new WriteExchange($exchange, $exchange->toArray());
    }
}
