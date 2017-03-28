<?php

namespace Fruty\SmartHome\Common\Specifications\Resolvers;

use Fruty\SmartHome\Common\Specifications\Contracts\SpecificationInterface;
use Fruty\SmartHome\Common\Specifications\Contracts\SpecificationResolverInterface;
use Fruty\SmartHome\Common\Specifications\PaginatedSpecification;
use Illuminate\Database\Eloquent\Builder;

class PaginatedResolver implements SpecificationResolverInterface
{

    /**
     * @param Builder $builder
     * @param SpecificationInterface $specification
     * @return mixed
     */
    public function apply($builder, SpecificationInterface $specification)
    {
        /** @var PaginatedSpecification $specification */
        return $builder->paginate(
            $specification->getPerPage(), $specification->getPerPage(),
            $specification->getColumns(), $specification->getPage()
        );
    }
}

