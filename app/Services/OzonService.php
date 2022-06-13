<?php

namespace App\Services;

use App\Models\OzonModel;


class OzonService extends Service
{
    public $model;
    public $route = 'ozon.';
    public $template = 'ozon.';
    public $translate = 'ozon.';

    function __construct()
    {
        parent::__construct(OzonModel::class);
    }

    public function otputData()
    {
        $with = $this->outputData();
        return $with;
    }
}
