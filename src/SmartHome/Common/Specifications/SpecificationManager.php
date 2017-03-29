<?php

namespace Fruty\SmartHome\Common\Specifications;

class SpecificationManager
{
    /**
     * @var array
     */
    private $specifications = [];

    /**
     * @param string $specification
     * @param string $resolver
     */
    public function addResolver(string $specification, string $resolver)
    {
        $this->specifications[$specification] = $resolver;
    }

    /**
     * @param $specification
     * @return callable|\Illuminate\Foundation\Application|mixed|null
     */
    public function getResolver($specification)
    {
        $class = is_object($specification) ? get_class($specification) : $specification;
        $resolver = $this->specifications[$class] ?? null;

        return is_callable($resolver) ? $resolver : app($resolver);
    }
}
