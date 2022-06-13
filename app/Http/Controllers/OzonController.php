<?php

namespace App\Http\Controllers;

use App\Services\OzonService;
use Illuminate\Http\Request;

class OzonController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(OzonService $service)
    {
        $this->service = $service;
    }
}
