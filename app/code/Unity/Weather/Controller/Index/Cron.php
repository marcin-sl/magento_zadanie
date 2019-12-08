<?php

namespace Unity\Weather\Controller\Index;

use Magento\Framework\App\Action\Context;

class Cron extends \Magento\Framework\App\Action\Action
{
    protected $_resultPageFactory;

    public function __construct(Context $context, \Magento\Framework\View\Result\PageFactory $resultPageFactory)
    {
        $this->_resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $weather = $this->_objectManager->create('Unity\Weather\Model\Weather');

        $current_weather = $weather->checkWeather();

        $weather->setData($current_weather);

        $success = $weather->save();
    }
}