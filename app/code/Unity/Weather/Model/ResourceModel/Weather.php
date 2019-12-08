<?php

namespace Unity\Weather\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Weather Resource Model
 */
class Weather extends AbstractDb
{
    /**
     * Initialize resource
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init('weather_data', 'data_id');
    }
}
