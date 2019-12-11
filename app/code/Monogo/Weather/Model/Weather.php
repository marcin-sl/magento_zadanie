<?php

namespace Monogo\Weather\Model;

use Magento\Framework\Model\AbstractModel;

/**
 * Weather Model
 *
 */
class Weather extends AbstractModel
{
    private $_city_id = 765876;
    private $_api_key = "704ca1ef542cdeaffc4e919dad40e15d";
    const SUCCESS = 200;

    /**
     * @var \Magento\Framework\Stdlib\DateTime
     */
    protected $_dateTime;

    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init(\Monogo\Weather\Model\ResourceModel\Weather::class);
    }

    /**
     * Check weather data and saves
     * @return void
     * @throws \Exception
     */
    public function checkWeather()
    {
        $city_id = $this->_city_id;
        $url = "https://api.openweathermap.org/data/2.5/weather?id=" . $city_id . "&lang=pl&units=metric&APPID=" . $this->_api_key;

        $curl = new \Magento\Framework\HTTP\Client\Curl();
        $curl->get($url);
        $response = $curl->getBody();
        $data = json_decode($response);

        if ($data->cod != $this::SUCCESS)
        {
            $data_to_set = [
                'city_id'   => $city_id,
                'error' => true,
                'error_message' => $data->message,
            ];
        }
        else
        {
            $data_to_set = [
                'error' => false,
                'temp'  => $data->main->temp,
                'temp_min'  => $data->main->temp_min,
                'temp_max'  => $data->main->temp_max,
                'wind'  => $data->wind->speed,
                'humidity'  => $data->main->humidity,
                'pressure'  => $data->main->pressure,
                'data'  => $response,
                'city_id'   => $city_id,
            ];
        }

        $this->setData($data_to_set);
        $this->save();
    }
}
