<?php
namespace App\SmartHome\Exchange\Concern\Contracts;

use App\SmartHome\Common\Specifications\SpecificationInterface;
use App\SmartHome\Exchange\Concern\ValueObjects\ExchangeId;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Collection;

interface ExchangeRepositoryInterface
{
    /**
     * @param ExchangeId $id
     * @return ExchangeInterface | null
     */
    public function findById(ExchangeId $id);

    /**
     * @param ExchangeId $id
     * @return ExchangeInterface
     * @throws ModelNotFoundException|\Exception
     */
    public function findOrFail(ExchangeId $id);

    /**
     * @param SpecificationInterface $specification
     * @return Collection|ExchangeInterface[]
     */
    public function matches(SpecificationInterface $specification);


    /**
     * @param ExchangeInterface $exchange
     * @return bool
     */
    public function save(ExchangeInterface $exchange) : bool;

    /**
     * @param ExchangeInterface $exchange
     * @return bool
     */
    public function remove(ExchangeInterface $exchange) : bool;

    /**
     * @return ExchangeModelFactoryInterface
     */
    public function getFactory() : ExchangeModelFactoryInterface;
}
