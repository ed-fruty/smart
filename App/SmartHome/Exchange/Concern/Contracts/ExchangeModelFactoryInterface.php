<?php
namespace App\SmartHome\Exchange\Concern\Contracts;

interface ExchangeModelFactoryInterface
{
    /**
     * @param array $attributes
     * @return ExchangeInterface
     */
    public function createReadExchange(array $attributes = []) : ExchangeInterface;

    /**
     * @param array $attributes
     * @return ExchangeInterface
     */
    public function hydrate(array $attributes = []) : ExchangeInterface;

    /**
     * @param ExchangeInterface $exchange
     * @return WriteExchangeInterface
     */
    public function createWriteExchange(ExchangeInterface $exchange) : WriteExchangeInterface;
}
