<?php
namespace App\SmartHome\Exchange\Integration\Eloquent;

use App\SmartHome\Common\Specifications\SpecificationInterface;
use App\SmartHome\Exchange\Concern\Contracts\ExchangeInterface;
use App\SmartHome\Exchange\Concern\Contracts\ExchangeRepositoryInterface;
use App\SmartHome\Exchange\Concern\ValueObjects\ExchangeId;
use Illuminate\Support\Collection;

/**
 * Class ExchangeRepository
 * @package App\SmartHome\Exchange\Integration\Eloquent
 */
class ExchangeRepository implements ExchangeRepositoryInterface
{

    /**
     * @param ExchangeId $id
     * @return ExchangeInterface | null
     */
    public function findById(ExchangeId $id)
    {
        return (new Exchange())->newQuery()->find($id->getId());
    }

    /**
     * @param SpecificationInterface $specification
     * @return Collection|ExchangeInterface[]
     */
    public function matches(SpecificationInterface $specification)
    {
        $query = (new Exchange())->newQuery();

        return $specification->apply($query) ?: $query->get();
    }

    /**
     * Create new instance
     * @param array $attributes
     * @return ExchangeInterface
     */
    public function newInstance(array $attributes = []): ExchangeInterface
    {
        return new Exchange($attributes, false);
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
}
