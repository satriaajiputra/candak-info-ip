<?php
namespace CandakInfoIP\Engine;

class GrabIPAddress extends ClientAddress
{
    public $url = 'http://www.geoplugin.net/json.gp';
    protected static $initClass = null;
    protected $data = null;
    protected $ip = null;

    /**
     * Set the IP Address want to grab and instantiate the class
     * 
     * @param mixed $ip
     * @return GrabIPAddress $object
     */
    public static function grab($ip = false)
    {
        // if $ip is not false or filled, the system will validate that IP is valid or not
        if($ip) {
            if(!filter_var($ip, FILTER_VALIDATE_IP)) return false;
        }

        // instantiate the GrabIPAddress class and store the $ip address
        self::$initClass = new GrabIPAddress;
        self::$initClass->ip = $ip;

        // return the instance of class
        return self::$initClass;
    }

    /**
     * Filter default json data
     * 
     * @param object $data
     * @return object
     */
    protected function filterData($data)
    {
        // convert to object
        $this->data = (object) array(
            'server' => (object) array(
                'request' => $data->geoplugin_request,
                'status' => $data->geoplugin_status,
                'delay' => $data->geoplugin_delay,
            ),
            'location' => (object) array(
                'city' => $data->geoplugin_city,
                'region' => $data->geoplugin_region,
                'regionCode' => $data->geoplugin_regionCode,
                'regionName' => $data->geoplugin_regionName,
                'areaCode' => $data->geoplugin_areaCode,
                'dmaCode' => $data->geoplugin_dmaCode,
                'countryCode' => $data->geoplugin_countryCode,
                'countryName' => $data->geoplugin_countryName,
                'europeArea' => $data->geoplugin_inEU,
                'euVATrate' => $data->geoplugin_euVATrate,
                'continentCode' => $data->geoplugin_continentCode,
                'continentName' => $data->geoplugin_continentName,
                'latitude' => $data->geoplugin_latitude,
                'longitude' => $data->geoplugin_longitude,
                'locationAccuracyRadius' => $data->geoplugin_locationAccuracyRadius,
                'timezone' => $data->geoplugin_timezone,
            ),
            'currency' => (object) array(
                'currencyCode' => $data->geoplugin_currencyCode,
                'currencySymbol' => $data->geoplugin_currencySymbol,
                'currencySymbol_UTF8' => $data->geoplugin_currencySymbol_UTF8,
                'currencyConverter' => $data->geoplugin_currencyConverter,
            )
        );

        return $this->data;
    }

    /**
     * Get the grabbed IP Address data
     * 
     * @param boolean $toArray
     * @return mixed
     */
    public function get($toArray = false)
    {

        // if $ip is null or false, the system will get the client IP Address automatically
        try {

            // if failed get the ip data
            $data = json_decode(
                file_get_contents($this->url . "?ip=" . $this->ip)
            );
        } catch(\Exception $exception) {
            die($exception->getMessage());
        }
        
        // filter default data from grabbed json to custom object
        $data = $this->filterData($data);

        // convert the filtered data object to array if $toArray attribute are true
        if($toArray) $data = (array)$data;

        return $data;
    }
}