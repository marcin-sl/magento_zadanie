<?php

namespace Monogo\Weather\Model\ResourceModel\Weather;

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
        $this->_init('Monogo\Weather\Model\Weather', 'Monogo\Weather\Model\ResourceModel\Weather');
    }
}
