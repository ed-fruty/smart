<?php
namespace Fruty\SmartHome\Exchange\Concern\Traits;

use Fruty\SmartHome\Exchange\Concern\Contracts\ExchangeRepositoryInterface;

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
