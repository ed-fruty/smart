<?php
namespace Fruty\SmartHome\Exchange\Concern\Contracts;

use Fruty\SmartHome\Common\Specifications\SpecificationInterface;
use Fruty\SmartHome\Exchange\Concern\ValueObjects\ExchangeId;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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
    public function matches(SpecificationInterface $specification = null);


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
