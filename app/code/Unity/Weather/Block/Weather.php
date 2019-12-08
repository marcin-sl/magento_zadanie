<?php

namespace Unity\Weather\Block;

class Weather extends \Magento\Framework\View\Element\Template
{
    const SUCCESS = '200';

    public function _prepareLayout()
    {
        return parent::_prepareLayout();
    }

    public function getCurrentWeather($city_id)
    {
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $collection = $objectManager->create('Unity\Weather\Model\ResourceModel\Weather\Collection');
        $current_weather = $collection
            ->addFieldToFilter('city_id', $city_id)
            ->addFieldToFilter('cod', $this::SUCCESS)
            ->setOrder('data_id', 'DESC')
            ->getFirstItem();
        $current_weather['data'] = json_decode($current_weather['data'], true);
        return $current_weather;
    }
}
