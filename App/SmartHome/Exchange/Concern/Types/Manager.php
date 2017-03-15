<?php
namespace App\SmartHome\Exchange\Concern\Types;

use App\SmartHome\Exchange\Concern\Contracts\ExchangeTypeInterface;
use App\SmartHome\Exchange\Concern\ValueObjects\ExchangeTypeId;
use Illuminate\Support\Collection;

class Manager
{
    protected $types;

    /**
     * Manager constructor.
     */
    public function __construct()
    {
        $this->types = new Collection();
    }

    /**
     * @param ExchangeTypeInterface $exchangeType
     */
    public function push(ExchangeTypeInterface $exchangeType)
    {
        $this->types->push($exchangeType);
    }

    /**
     * @param ExchangeTypeId $exchangeTypeId
     * @return mixed
     */
    public function find(ExchangeTypeId $exchangeTypeId)
    {
        return $this->types->first(function(ExchangeTypeInterface $exchangeType) use ($exchangeTypeId) {
            return $exchangeTypeId->equals($exchangeType->getId());
        });
    }
}
