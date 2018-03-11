<?php

namespace App\Api;

class ApiException extends \Exception
{
  public function __construct($param)
  {
    parent::__construct("Parameter '" . $param . "' must be declared before the request");
  }
}
