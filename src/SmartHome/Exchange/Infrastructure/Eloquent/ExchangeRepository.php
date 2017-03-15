<?php
namespace Fruty\SmartHome\Exchange\Infrastructure\Eloquent;

use Fruty\SmartHome\Common\Specifications\SpecificationInterface;
use Fruty\SmartHome\Exchange\Concern\Contracts\ExchangeInterface;
use Fruty\SmartHome\Exchange\Concern\Contracts\ExchangeModelFactoryInterface;
use Fruty\SmartHome\Exchange\Concern\Contracts\ExchangeRepositoryInterface;
use Fruty\SmartHome\Exchange\Concern\ValueObjects\ExchangeId;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Collection;

/**
 * Class ExchangeRepository
 * @package Fruty\SmartHome\Exchange\Integration\Eloquent
 */
class ExchangeRepository implements ExchangeRepositoryInterface
{

    /**
     * @var Exchange
     */
    private $model;

    /**
     * ExchangeRepository constructor.
     * @param Exchange $model
     */
    public function __construct(Exchange $model)
    {
        $this->model = $model;
    }

    /**
     * @param ExchangeId $id
     * @return ExchangeInterface | null
     */
    public function findById(ExchangeId $id)
    {
        return $this->model->newQuery()->find($id->getId());
    }

    /**
     * @param SpecificationInterface $specification
     * @return Collection|ExchangeInterface[]
     */
    public function matches(SpecificationInterface $specification = null)
    {
        $query = $this->model->newQuery();

        if (! $specification) {
            return $query->get();
        }

        return $specification->apply($query) ?: $query->get();
    }

    /**
     * @param ExchangeInterface $exchange
     * @return bool
     */
    public function save(ExchangeInterface $exchange): bool
    {
        /** @var Exchange $exchange */
        return $exchange->save();
    }

    /**
     * @param ExchangeInterface $exchange
     * @return bool
     */
    public function remove(ExchangeInterface $exchange): bool
    {
        /** @var Exchange $exchange */
        return $exchange->delete();
    }

    /**
     * @param ExchangeId $id
     * @return ExchangeInterface|Model
     * @throws ModelNotFoundException|\Exception
     */
    public function findOrFail(ExchangeId $id)
    {
        return $this->model->newQuery()->findOrFail($id);
    }

    /**
     * @return ExchangeModelFactoryInterface
     */
    public function getFactory(): ExchangeModelFactoryInterface
    {
        return new ExchangeModelFactory();
    }
}
