<?php

namespace Fruty\SmartHome\Common\Specifications\Traits;

use Fruty\SmartHome\Common\Specifications\Contracts\SpecificationInterface;
use Fruty\SmartHome\Common\Specifications\Contracts\SpecificationResolverInterface;
use Fruty\SmartHome\Common\Specifications\SpecificationManager;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pipeline\Pipeline;

/**
 * Class EloquentSpecificationResolves
 * @package Fruty\SmartHome\Common\Specifications\Traits
 *
 * @property Model $model
 */
trait EloquentSpecificationResolves
{
    /**
     * @param SpecificationInterface $specification
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function searchWithSpecification(SpecificationInterface $specification)
    {
        /** @var SpecificationResolverInterface $resolver */
        $resolver = app()->make(SpecificationManager::class)->getResolver($specification);

        $query = $this->model->newQuery();

//        $pipeline = new Pipeline();
//        return $pipeline->send(null)
//            ->through(function() use($resolver, $query, $specification) {
//                return $resolver->apply($query, $specification);
//            })
//            ->then(function($payload) use ($query) {
//                 return $payload ?: $query->get();
//            });


        return $resolver->apply($query, $specification) ?: $query->get();
    }
}
