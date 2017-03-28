<?php

namespace Fruty\SmartHome\Common\Specifications\Contracts;

use Illuminate\Database\Eloquent\Builder;

interface SpecificationResolverInterface
{
    /**
     * @param Builder $builder
     * @param SpecificationInterface $specification
     * @return mixed
     */
    public function apply($builder, SpecificationInterface $specification);
}