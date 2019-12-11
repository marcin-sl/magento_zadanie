<?php

namespace Monogo\Weather\Block;

class Weather extends \Magento\Framework\View\Element\Template
{
    public function _prepareLayout()
    {
        return parent::_prepareLayout();
    }

    public function getCurrentWeather($city_id)
    {
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $collection = $objectManager->create('Monogo\Weather\Model\ResourceModel\Weather\Collection');
        return $collection
            ->addFieldToFilter('city_id', $city_id)
            ->addFieldToFilter('error', false)
            ->setOrder('data_id', 'DESC')
            ->getFirstItem();
    }
}
