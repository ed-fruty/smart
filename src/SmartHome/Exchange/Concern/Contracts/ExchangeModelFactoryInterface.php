<?php
namespace Fruty\SmartHome\Exchange\Concern\Contracts;

interface ExchangeModelFactoryInterface
{
    /**
     * @return ExchangeInterface
     */
    public function createReadExchange() : ExchangeInterface;

    /**
     * @param ExchangeInterface $exchange
     * @return WriteExchangeInterface
     */
    public function createWriteExchange(ExchangeInterface $exchange) : WriteExchangeInterface;
}
