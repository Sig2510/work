<?php

namespace App\Api;

use GuzzleHttp\Client;

class OpenweatherApi
{
  public static function getCurrentWeather()
  {
    $client = new Client();
    $response = $client->request('GET', 'http://api.openweathermap.org/data/2.5/forecast?units=metric&q=' . 'odessa,ua' . '&appid=4f01862646dd667067ac70356e7196a8');

    return json_decode((string) $response->getBody());
  }

}
