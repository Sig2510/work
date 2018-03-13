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
  public static function getHistoryWeather($city)
  {
    $client = new hClient();
    $response = $client->request('GET', 'http://history.openweathermap.org/data/2.5/history/city?q=odesa,ua&type=hour&start=1488844800&end=1488844800' . $city . '&appid=' . env('OPENWEATHERMAP_API_KEY'));
    return json_decode((string) $response->getBody());
  }
}
