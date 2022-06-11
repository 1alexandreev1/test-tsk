<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Datatables;
use Yajra\DataTables\Html\Builder as BuilderDT;

class OzonService extends Service
{
    protected $model;
    protected $route = 'ozon.';
    protected $template = 'ozon.';
    protected $translate = 'ozon.';

    function __construct(OzonModel $model)
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
        $data = Datatables::of($query);
        return $data;
    }
}
