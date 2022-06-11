<?php

namespace App\Services;

use App\Services\Service;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Datatables;
use Yajra\DataTables\Html\Builder as BuilderDT;

class YandexService extends Service
{
    protected $model;
    protected $route = 'yandex.';
    protected $template = 'yandex.';
    protected $translate = 'yandex.';

    function __construct(YandexModel $model)
    {
        $this->model = $model;
    }

    public function tableColumns()
    {
        return [
            [
                'title' => 'id',
                'data' => 'id',
                'width' => '5%'
            ],
            [
                'title' => 'Название',
                'data' => 'name',
            ],
        ];
    }

    public function dataTableData($query = null, $with = [])
    {
        $query = !empty($query) ?
            $query->select($this->columnsToSelect($this->tableColumns()))->with($with) :
            $this->model::select($this->columnsToSelect($this->tableColumns()))->with($with);
        $data = Datatables::of($query)->make(true);
        return $data;
    }
}
