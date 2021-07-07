<?php

namespace Openska\Geocoding;

use GuzzleHttp\Client;

class Geocoding
{
    /** @var Client */
    protected $httpClient;

    /**
     * Geocoding constructor.
     * @param Client $httpClient
     */
    public function __construct(Client $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function geocode($address)
    {
        $address = urlencode($address);
        $res = $this->httpClient->get("https://api-adresse.data.gouv.fr/search/", [
            "query" => ["q" => $address]
        ]);
        $obj = json_decode($res->getBody()->getContents(), true);

        return $obj['features'][0]['geometry']['coordinates'];
    }
}