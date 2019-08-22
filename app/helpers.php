<?php
if (!function_exists('zipToAddress')) {
    function zipToAddress($zipCode, $streetNumber)
    {
        $client = new GuzzleHttp\Client();
        $url = "https://api.postcodeapi.nu/v3/lookup/{$zipCode}/{$streetNumber}";
        $result = $client->request('GET', $url, [
            'headers' => [
                'X-Api-Key' => env('POSTCODE_API_KEY') // NOTE: PERSONAL KEY, PLEASE DO NOT USE.
            ]
        ]);
        return json_decode($result->getBody());
    }
}

if (!function_exists("getLatLong")) {
    function getLatLong($city, $street, $street_number)
    {
        $address = urlencode("{$street} {$street_number} {$city}");
        $key = env("GEOCODE_API_KEY");
        $url = "https://maps.google.com/maps/api/geocode/json?address={$address}&sensor=false&region=Netherlands&key={$key}";
        $client = new GuzzleHttp\Client();

        $result = $client->request('GET', $url, []);
        $result = json_decode($result->getBody());
        return $result->results[0]->geometry->location;
    }
}

if (!function_exists("getDistance")) {
    function getDistance($pickup, $dropoff)
    {
        $key = env("GEOCODE_API_KEY");
        $url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins={$pickup->lat},{$pickup->lng}&destinations={$dropoff->lat},{$dropoff->lng}&mode=driving&language=nl-NL&key={$key}";
        $client = new GuzzleHttp\Client();

        $result = $client->request('GET', $url, []);
        $result = json_decode($result->getBody());
        return $result;
    }
}