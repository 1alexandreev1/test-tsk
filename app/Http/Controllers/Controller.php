<?php

namespace App\Http\Controllers;

use App\Services\Service;

class Controller extends BaseController
{
    protected $service;

    function __construct(Service $service)
    {
        $this->service = $service;
    }
}
