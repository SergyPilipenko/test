<?php
declare(strict_types = 1);

namespace Test\Weather\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;
use \Test\Weather\Api\Data\WeatherInterface;
use Test\Weather\Api\Data\WeatherSearchResultInterface;

interface WeatherRepositoryInterface
{

    /**
     * Save entity
     *
     * @param WeatherInterface $weather
     * @return WeatherInterface
     * @throws LocalizedException
     */
    public function save(
        WeatherInterface $weather
    ): WeatherInterface;

    /**
     * Retrieve entity
     *
     * @param string $entityId
     * @return WeatherInterface
     * @throws LocalizedException
     */
    public function get(string $entityId): Data\WeatherInterface;

    /**
     * Retrieve entity matching the specified criteria.
     *
     * @param SearchCriteriaInterface $searchSearchCriteria
     * @return WeatherSearchResultInterface
     * @throws LocalizedException
     */
    public function getList(
        SearchCriteriaInterface $searchSearchCriteria
    ): WeatherSearchResultInterface;

    /**
     * Delete entity
     *
     * @param WeatherInterface $weather
     * @return void
     * @throws LocalizedException
     */
    public function delete(
        WeatherInterface $weather
    ): void;

    /**
     * Delete entity by ID
     *
     * @param string $entityId
     * @return void
     * @throws NoSuchEntityException
     * @throws LocalizedException
     */
    public function deleteById(string $entityId): void;
}
