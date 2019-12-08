<?php

namespace Unity\Weather\Model\ResourceModel\Weather;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

/**
 * Weather Resource Model Collection
 *
 */
class Collection extends AbstractCollection
{
    /**
     * Initialize resource collection
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init('Unity\Weather\Model\Weather', 'Unity\Weather\Model\ResourceModel\Weather');
    }
}
