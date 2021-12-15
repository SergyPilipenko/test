<?php
declare(strict_types = 1);

namespace Test\Weather\CustomerData;

use Magento\Customer\CustomerData\SectionSourceInterface;
use Magento\Framework\DataObject;
use Test\Weather\Model\ResourceModel\Weather\CollectionFactory;

class WeatherData extends DataObject implements SectionSourceInterface
{
    /**
     * @var CollectionFactory
     */
    private CollectionFactory $collectionFactory;

    /**
     * Data constructor.
     *
     * @param CollectionFactory $collectionFactory
     * @param array $data
     */
    public function __construct(
        CollectionFactory $collectionFactory,
        array $data = []
    ) {
        parent::__construct($data);
        $this->collectionFactory = $collectionFactory;
    }

    /**
     * Get data
     *
     * @return array
     */
    public function getSectionData(): array
    {
        $collection = $this->collectionFactory->create();
        $data = $collection->getFirstItem()->getData();
        return [
            'description' => "{$data['description']}",
            'temperature' => html_entity_decode("Temperature: {$data['temperature']} &deg;")
        ];
    }
}
