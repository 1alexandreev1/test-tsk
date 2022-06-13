<?php

namespace App\Services;

use App\Models\YandexModel;
use App\Services\Service;
use Yajra\DataTables\Datatables;
use Yajra\DataTables\Html\Builder as BuilderDT;

class YandexService extends Service
{
    public $model;
    public $route = 'yandex.';
    public $template = 'yandex.';
    public $translate = 'yandex.';

    function __construct()
    {
        parent::__construct(YandexModel::class);
    }

    public function otputData()
    {
        $with = $this->outputData();
        return $with;
    }
}
