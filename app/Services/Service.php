<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Datatables;
use Yajra\DataTables\Html\Builder as BuilderDT;

class Service
{
    protected $model;
    protected $route;
    protected $template;
    protected $translate;

    function __construct(Model $model)
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

    public function constructViewDT($selectorForm = '#dt_filters')
    {
        return app(BuilderDT::class)
            ->language(config('datatables.lang.url'))
            ->orders([0, 'desc'])
            ->pageLength(10)
            ->ajaxWithForm('', $selectorForm)
            ->columns($this->tableColumns())
            ->parameters([
                'paging' => true,
                'searching' => true,
                'info' => true,
                'searchDelay' => 350,
                'sDom' => '<"top"l>t<"bottom">p<div><"clear">',
                'searchHighlight' => true
            ]);
    }

    public function dataTableData($query = null, $with = [])
    {
        $query = !empty($query) ?
            $query->select($this->columnsToSelect($this->tableColumns()))->with($with) :
            $this->model::select($this->columnsToSelect($this->tableColumns()))->with($with);
        $data = Datatables::of($query)->make(true);
        return $data;
    }

    protected function columnsToSelect($array)
    {
        if (!empty($array)) {
            $resultArray = [];
            foreach ($array as $value) {
                if (!isset($value['remove_select']) or $value['remove_select'] !== true) {
                    if (isset($value['name'])) {
                        $resultArray[] = $value['name'];
                    } else {
                        $resultArray[] = $value['data'];
                    }
                }
            }
            return $resultArray;
        }
        return $array;
    }
}
