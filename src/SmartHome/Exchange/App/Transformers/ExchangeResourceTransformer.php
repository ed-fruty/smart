<?php
namespace Fruty\SmartHome\Exchange\App\Transformers;

use Fruty\SmartHome\Exchange\Concern\Contracts\ExchangeInterface;

class ExchangeResourceTransformer
{
    public function transform(ExchangeInterface $exchange)
    {
        return [
            'id'    => $exchange->getId()
        ];
    }
}
