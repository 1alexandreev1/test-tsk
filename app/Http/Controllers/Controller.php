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

    public function index()
    {
        if (request()->ajax()) {
            return $this->service->getDatatableElements();
        }
        return view('admin.' . $this->service->template . 'index')->with($this->service->outputData());
    }
}
