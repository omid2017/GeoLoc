<?php

/**
 * Class Location
 */
class Location
{
    private $lat;
    private $lng;

    /**
     * @return string
     */
    public function getLocation()
    {
        $url = sprintf("https://maps.googleapis.com/maps/api/geocode/json?latlng=%s,%s", $this->lat, $this->lng);

        $content = file_get_contents($url); // get json content
        $metadata = json_decode($content, true); //json decoder

        if (count($metadata['results']) > 0) {
            $result = $metadata['results'][0];

            // save it in db for further use
            return $result['formatted_address'];
        } else {
            return 'No results returned you might be on LocalHost';
        }
    }

    /**
     * Position constructor.
     */
    public function __construct()
    {
        if (isset($_POST['lat'], $_POST['lng'])) {
            $this->lat = $_POST['lat'];
            $this->lng = $_POST['lng'];
        }
    }
}

$LocationFinder = new Location();
echo $LocationFinder->getLocation();


