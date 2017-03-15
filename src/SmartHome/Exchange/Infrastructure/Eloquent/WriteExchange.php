<?php
namespace Fruty\SmartHome\Exchange\Infrastructure\Eloquent;

use Fruty\SmartHome\Common\Status\Status;
use Fruty\SmartHome\Exchange\Concern\Contracts\ExchangeInterface;
use Fruty\SmartHome\Exchange\Concern\Contracts\ExchangeTypeInterface;
use Fruty\SmartHome\Exchange\Concern\Contracts\WriteExchangeInterface;
use Fruty\SmartHome\Exchange\Concern\ValueObjects\ExchangeId;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class WriteExchange extends Model implements WriteExchangeInterface
{

    /**
     * @return ExchangeId
     */
    public function getId(): ExchangeId
    {
        // TODO: Implement getId() method.
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        // TODO: Implement getName() method.
    }

    /**
     * @return ExchangeTypeInterface
     */
    public function getType(): ExchangeTypeInterface
    {
        // TODO: Implement getType() method.
    }

    /**
     * @return Status
     */
    public function getStatus(): Status
    {
        // TODO: Implement getStatus() method.
    }

    /**
     * Get devices collection.
     *
     * @return Collection
     */
    public function getDevices(): Collection
    {
        // TODO: Implement getDevices() method.
    }

    public function setName(string $name)
    {
        // TODO: Implement setName() method.
    }

    public function setStatus(Status $status)
    {
        // TODO: Implement setStatus() method.
    }

    public function getReadExchange(): ExchangeInterface
    {
        // TODO: Implement getReadExchange() method.
    }
}
