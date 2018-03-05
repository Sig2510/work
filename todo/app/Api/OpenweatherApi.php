<?php

namespace App\Api;

use GuzzleHttp\Client;

class OpenweatherApi
{
  public static function getCurrentWeather($city)
  {
    $client = new Client();
    $response = $client->request('GET', 'http://api.openweathermap.org/data/2.5/weather?units=metric&q=' . $city . '&appid=' . env('OPENWEATHERMAP_API_KEY'));

    return json_decode((string) $response->getBody());
  }
}
