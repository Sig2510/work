<?php

namespace App;

use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;
use App\Api\OpenweatherApi;

class Weather extends Model
{
    protected $fillable = ['temp', 'city', 'icon', 'hum'];

    public static function getCurrentWeather($city)
    {
      $weather = self::where('city', $city)->where('created_at', '>', Carbon::now()->subHours(1)->toDateString())->first();
      # dd($weather);
      if ($weather) {
        return $weather;
      } else {
        $api_data = OpenweatherApi::getCurrentWeather($city);
        $new_weather = new Weather([
          'city' => $city,
          'temp' => $api_data->main->temp,
          'hum'  => $api_data->main->humidity,
          'icon' => $api_data->weather[0]->icon
        ]);

        $new_weather->save();

        return $new_weather;
      }
    }
}
