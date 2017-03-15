<?php
namespace App\SmartHome\Exchange\Integration\Eloquent;

use App\SmartHome\Common\Status\Status;
use App\SmartHome\Exchange\Concern\Contracts\ExchangeInterface;
use App\SmartHome\Exchange\Concern\Contracts\ExchangeTypeInterface;
use App\SmartHome\Exchange\Concern\Types\Manager as ExchangeTypeManager;
use App\SmartHome\Exchange\Concern\ValueObjects\ExchangeId;
use App\SmartHome\Exchange\Concern\ValueObjects\ExchangeTypeId;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

final class Exchange extends Model implements ExchangeInterface
{
    private const ATTRIBUTE_ID = 'id';
    private const ATTRIBUTE_NAME = 'name';
    private const ATTRIBUTE_STATUS = 'status';
    private const ATTRIBUTE_TYPE_ID = 'type_id';

    private const RELATION_DEVICES = 'devices';

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->getAttribute(self::ATTRIBUTE_NAME);
    }

    /**
     * @return ExchangeTypeInterface
     */
    public function getType(): ExchangeTypeInterface
    {
        $id = new ExchangeTypeId($this->getAttribute(self::ATTRIBUTE_TYPE_ID));

        return app(ExchangeTypeManager::class)->find($id);
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
        return $this->getRelation(self::RELATION_DEVICES);
    }

    /**
     * @return ExchangeId
     */
    public function getId(): ExchangeId
    {
        return new ExchangeId($this->getAttribute(self::ATTRIBUTE_ID));
    }
}
