<?php
declare(strict_types = 1);

namespace Test\Weather\Api\Data;

interface WeatherInterface
{
    public const ENTITY_ID = 'entity_id';
    public const TEMPERATURE = 'temperature';
    public const DESCRIPTION = 'description';

    /**
     * Get entity_id
     *
     * @return string|null
     */
    public function getEntityId(): ?string;

    /**
     * Set entity_id
     *
     * @param string|null $entityId
     * @return WeatherInterface
     */
    public function setEntityId(?string $entityId): self;

    /**
     * Get temperature
     *
     * @return string|null
     */
    public function getTemperature(): ?string;

    /**
     * Set temperature
     *
     * @param string $temp
     * @return WeatherInterface
     */
    public function setTemperature(string $temp): self;

    /**
     * Get description
     *
     * @return string|null
     */
    public function getDescription(): ?string;

    /**
     * Set description
     *
     * @param string $content
     * @return WeatherInterface
     */
    public function setDescription(string $content): self;
}
