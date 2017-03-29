<?php

namespace Fruty\SmartHome\Common\Providers;

use Fruty\SmartHome\Common\Specifications\PaginatedSpecification;
use Fruty\SmartHome\Common\Specifications\Resolvers\PaginatedResolver;
use Fruty\SmartHome\Common\Specifications\SpecificationManager;
use Illuminate\Support\ServiceProvider;

class CommonSpecificationProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->afterResolving(SpecificationManager::class, function(SpecificationManager $manager) {
            $manager->addResolver(PaginatedSpecification::class, PaginatedResolver::class);
        });
    }

}
