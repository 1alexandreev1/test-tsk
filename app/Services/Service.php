<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Datatables;
use Yajra\DataTables\Html\Builder as BuilderDT;

class Service
{
    public $model;
    public $route;
    public $template;
    public $translation;

    function __construct($model)
    {
        $this->model =  new $model;
    }

    public function outputData()
    {
        // $newModel = new $this->model;
        $with = [
            // 'permission' => $this->permission,
            'title' =>  __($this->translation . 'title'),
            'route' => $this->route,
            'template' => $this->template,
            'translation' => $this->translation,
        ];
        $with['dataTable'] = $this->constructViewDT();
        return $with;
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

    public function getDatatableElements()
    {
        $query = $this->model::query();
        return $this->dataTableData($query)->make(true);
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
