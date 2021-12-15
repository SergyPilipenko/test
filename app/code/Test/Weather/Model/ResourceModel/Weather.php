<?php
declare(strict_types=1);

namespace Test\Weather\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Weather extends AbstractDb
{
    public const TABLE_NAME = 'weather';
    public const FIELD_NAME = 'entity_id';

    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init(self::TABLE_NAME, self::FIELD_NAME);
    }
}
