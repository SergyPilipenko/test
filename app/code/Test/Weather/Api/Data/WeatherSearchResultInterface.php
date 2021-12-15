<?php
declare(strict_types=1);

namespace Test\Weather\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface WeatherSearchResultInterface extends SearchResultsInterface
{

    /**
     * Get weather list.
     *
     * @return array
     */
    public function getItems(): array;

    /**
     * Set entity_id list.
     *
     * @param array $items
     * @return $this
     */
    public function setItems(array $items): self;
}
