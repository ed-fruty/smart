<?php
namespace Fruty\SmartHome\Exchange\Concern\Contracts;

use Fruty\SmartHome\Common\Status\Status;
use Fruty\SmartHome\Exchange\Concern\ValueObjects\ExchangeId;
use Illuminate\Database\Eloquent\Collection;

interface ExchangeInterface
{
    /**
     * @return ExchangeId
     */
    public function getId() : ExchangeId;

    /**
     * @return string
     */
    public function getName() : string;


    public function getConnector() : ConnectorInterface;

    public function getDsn() : string;

    /**
     * @return Status
     */
    public function getStatus() : Status;

    /**
     * Get devices collection.
     *
     * @return Collection
     */
    public function getDevices() : Collection;
}
