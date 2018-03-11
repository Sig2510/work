<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class weathercontroller extends Controller
{
  $client = new Client();
$response = $client->request('GET', 'http://api.openweathermap.org/data/2.5/forecast?q=odessa,ua&appid=4f01862646dd667067ac70356e7196a8')
}
