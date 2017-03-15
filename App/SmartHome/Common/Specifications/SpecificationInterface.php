<?php
namespace App\SmartHome\Common\Specifications;

use Illuminate\Database\Eloquent\Builder;

interface SpecificationInterface
{
    /**
     * @param Builder $query
     * @return mixed
     */
    public function apply($query);
}
