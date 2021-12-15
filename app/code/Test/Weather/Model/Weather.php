<?php

namespace Test\Weather\Model;

use Magento\Framework\Model\AbstractModel;
use Test\Weather\Api\Data\WeatherInterface;
use Test\Weather\Model\ResourceModel\Weather as Resource;

class Weather extends AbstractModel implements WeatherInterface
{
    /**
     * @inheritDoc
     */
    public function _construct()
    {
        $this->_init(Resource::class);
    }

    /**
     * @inheritDoc
     */
    public function getEntityId(): ?string
    {
        return $this->getData(self::ENTITY_ID);
    }

    /**
     * @inheritDoc
     */
    public function setEntityId($entityId): WeatherInterface
    {
        return $this->setData(self::ENTITY_ID, $entityId);
    }

    /**
     * @inheritDoc
     */
    public function getTemperature(): ?string
    {
        return $this->getData(self::TEMPERATURE);
    }

    /**
     * @inheritDoc
     */
    public function setTemperature(string $temp): WeatherInterface
    {
        return $this->setData(self::TEMPERATURE, $temp);
    }

    /**
     * @inheritDoc
     */
    public function getDescription(): ?string
    {
        return $this->getData(self::DESCRIPTION);
    }

    /**
     * @inheritDoc
     */
    public function setDescription(string $content): WeatherInterface
    {
        return $this->setData(self::DESCRIPTION, $content);
    }
}
