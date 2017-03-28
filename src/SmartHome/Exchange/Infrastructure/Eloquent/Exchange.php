<?php
namespace Fruty\SmartHome\Exchange\Infrastructure\Eloquent;

use Carbon\Carbon;
use Fruty\SmartHome\Common\Status\Status;
use Fruty\SmartHome\Exchange\Concern\Contracts\ExchangeInterface;
use Fruty\SmartHome\Exchange\Concern\ValueObjects\Dsn;
use Fruty\SmartHome\Exchange\Concern\ValueObjects\ExchangeId;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class Exchange extends Model implements ExchangeInterface
{
    private const ATTRIBUTE_ID = 'id';
    private const ATTRIBUTE_NAME = 'name';
    private const ATTRIBUTE_STATUS = 'status';
    private const ATTRIBUTE_CONNECTOR_NAME = 'connector_name';
    private const ATTRIBUTE_DSN = 'dsn';
    private const ATTRIBUTE_CREATED_AT = 'created_at';
    private const ATTRIBUTE_UPDATED_AT = 'updated_at';

    private const RELATION_DEVICES = 'devices';


    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->getAttribute(self::ATTRIBUTE_NAME);
    }

    /**
     * @return Status
     */
    public function getStatus(): Status
    {
        return new Status($this->getAttribute(self::ATTRIBUTE_STATUS));
    }

    /**
     * Get devices collection.
     *
     * @return Collection
     */
    public function getDevices(): Collection
    {
        return $this->getRelation(self::RELATION_DEVICES) ?: new Collection();
    }

    /**
     * @return ExchangeId
     */
    public function getId(): ExchangeId
    {
        return new ExchangeId($this->getAttribute(self::ATTRIBUTE_ID));
    }

    /**
     * @return Dsn
     */
    public function getDsn(): Dsn
    {
        return new Dsn($this->getAttribute(self::ATTRIBUTE_DSN));
    }

    /**
     * @return string
     */
    public function getConnectorName(): string
    {
        return $this->getAttribute(self::ATTRIBUTE_CONNECTOR_NAME);
    }

    /**
     * @return Carbon
     */
    public function getCreatedAt(): Carbon
    {
        return $this->getAttribute(self::ATTRIBUTE_CREATED_AT);
    }

    /**
     * @return Carbon
     */
    public function getUpdatedAt(): Carbon
    {
        return $this->getAttribute(self::ATTRIBUTE_UPDATED_AT);
    }
}
