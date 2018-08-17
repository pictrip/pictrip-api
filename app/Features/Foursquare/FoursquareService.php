<?php

namespace App\Features\Foursquare;

use FoursquareApi;

class FoursquareService
{
    /**
     * @var FoursquareApi
     */
    private $api;

    public function __construct(FoursquareApi $api)
    {
        $this->api = $api;
    }

    public function get(string $method)
    {
        $json = $this->api->GetPublic($method);

        return $this->api->getResponseFromJsonString($json);
    }
}