<?php
namespace App\SmartHome\Exchange\Concern\Contracts;

use App\SmartHome\Common\Status\Status;

interface WriteExchangeInterface extends ExchangeInterface
{
    public function setName(string $name);

    public function setStatus(Status $status);

    public function getReadExchange() : ExchangeInterface;
}
