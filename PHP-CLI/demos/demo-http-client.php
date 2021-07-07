<?php

require_once __DIR__ . '/../vendor/autoload.php';


$httpClient = new \GuzzleHttp\Client();
$geocoder = new \Openska\Geocoding\Geocoding($httpClient);

$coords = $geocoder->geocode('21 rue de Saussure 75017 Paris');

echo "Latitude : " . $coords[1] . "\n";
echo "Longitude : " . $coords[0] . "\n";
