<?php
declare(strict_types=1);

namespace Test\Weather\Cron;

use Magento\Framework\Exception\LocalizedException;
use Test\Weather\Api\Data\WeatherInterfaceFactory;
use Test\Weather\Api\WeatherRepositoryInterface;
use Test\Weather\Model\Http\Client;
use Test\Weather\Model\ResourceModel\Weather\CollectionFactory;

class ApiService
{
    /**
     * @var Client
     */
    private Client $httpClient;

    /**
     * @var WeatherInterfaceFactory
     */
    private WeatherInterfaceFactory $weatherFactory;

    /**
     * @var WeatherRepositoryInterface
     */
    private WeatherRepositoryInterface $weatherRepository;

    /**
     * @var CollectionFactory
     */
    private CollectionFactory $collectionFactory;

    /**
     * @param Client $httpClient
     * @param WeatherInterfaceFactory $weatherFactory
     * @param WeatherRepositoryInterface $weatherRepository
     * @param CollectionFactory $collectionFactory
     */
    public function __construct(
        Client $httpClient,
        WeatherInterfaceFactory $weatherFactory,
        WeatherRepositoryInterface $weatherRepository,
        CollectionFactory $collectionFactory
    ) {
        $this->httpClient = $httpClient;
        $this->weatherFactory = $weatherFactory;
        $this->weatherRepository = $weatherRepository;
        $this->collectionFactory = $collectionFactory;
    }

    /**
     * Get data from api
     *
     * @throws LocalizedException
     * @throws \Exception
     */
    public function execute():void
    {
        $collection = $this->collectionFactory->create();
        $weather = $collection->getFirstItem();
        if (!$weather) {
            $weather = $this->weatherFactory->create();
        }
        $data = $this->httpClient->getWeatherData();

        foreach ($data['data'] as $item) {
            $weather->setData('temperature', $item['temp']);
            $weather->setData('description', $item['weather']['description']);
            $weather->setData('updated_datetime', time());
            $this->weatherRepository->save($weather);
        }
    }
}
