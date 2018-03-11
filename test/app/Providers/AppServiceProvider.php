<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Weather;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $weather = Weather::getCurrentWeather('odessa,ua');
        view()->share('weather', $weather->temp);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
