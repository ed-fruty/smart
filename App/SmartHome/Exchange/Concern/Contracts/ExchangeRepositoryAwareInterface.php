<?php
namespace App\SmartHome\Exchange\Concern\Contracts;

interface ExchangeRepositoryAwareInterface
{
    /**
     * @param ExchangeRepositoryInterface $exchangeRepository
     */
    public function setExchangeRepository(ExchangeRepositoryInterface $exchangeRepository);
}
