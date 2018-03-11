<?php

namespace App\Api;

use GuzzleHttp\Client;

class OpenweatherApi
{
  private $appid;
  private $client;
  private $url;

  private $city;

  private function __construct($base_url)
  {
    $this->client = new Client();
    $this->appid = '4f01862646dd667067ac70356e7196a8';

    $this->url = $base_url . '?appid=' . $this->appid;
  }

  public static function current()
  {
    return new self('http://api.openweathermap.org/data/2.5/weather');
  }

  public static function forecast()
  {
    return new self('http://api.openweathermap.org/data/2.5/forecast');
  }

  public static function historical()
  {
    return new self('http://history.openweathermap.org/data/2.5/history/city');
  }

  public function city($city)
  {
    $this->city = $city;

    $this->url .= '&q=' . $city;
    return $this;
  }

  public function accuracy($accuracy)
  {
    $this->url .= '&type=' . $accuracy;
    return $this;
  }

  public function units($units)
  {
    $this->url .= '&units=' . $units;
    return $this;
  }

  public function locale($locale)
  {
    $this->url .= '&lang=' . $locale;
    return $this;
  }

  public function get()
  {
    if (is_null($this->city)) {
      throw new ApiException("City");
    }

    $response = $this->client->request('GET', $this->url);
    return json_decode((string) $response->getBody());
  }
}
