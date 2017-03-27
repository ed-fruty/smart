<?php
namespace Fruty\SmartHome\Exchange\Concern\Contracts;

use Carbon\Carbon;
use Fruty\SmartHome\Common\Status\Status;
use Fruty\SmartHome\Exchange\Concern\ValueObjects\Dsn;
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

    /**
     * @return string
     */
    public function getConnectorName() : string;

    /**
     * @return Dsn
     */
    public function getDsn() : Dsn;

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

    /**
     * @return Carbon
     */
    public function getCreatedAt() : Carbon;

    /**
     * @return Carbon
     */
    public function getUpdatedAt() : Carbon;
}
