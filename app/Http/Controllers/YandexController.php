<?php

namespace App\Http\Controllers;

use App\Services\YandexService;
use Illuminate\Http\Request;

class YandexController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(YandexService $service)
    {
        $this->service = $service;
    }
}
