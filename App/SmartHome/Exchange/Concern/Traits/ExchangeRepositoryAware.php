<?php
namespace App\SmartHome\Exchange\Concern\Traits;

use App\SmartHome\Exchange\Concern\Contracts\ExchangeRepositoryInterface;

trait ExchangeRepositoryAware
{
    /**
     * @var ExchangeRepositoryInterface
     */
    protected $exchangeRepository;

    /**
     * @param ExchangeRepositoryInterface $exchangeRepository
     */
    public function setExchangeRepository(ExchangeRepositoryInterface $exchangeRepository)
    {
        $this->exchangeRepository = $exchangeRepository;
    }
}
