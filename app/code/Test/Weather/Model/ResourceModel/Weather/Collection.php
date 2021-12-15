<?php
declare(strict_types=1);

namespace Test\Weather\Model\ResourceModel\Weather;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Test\Weather\Model\Weather;

class Collection extends AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'entity_id';

    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init(
            Weather::class,
            \Test\Weather\Model\ResourceModel\Weather::class
        );
    }
}
