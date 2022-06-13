@extends('adminlte::page')

@section('title', 'Yandex')

@section('content_header')
    <h1>Yandex</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! $dataTable->table() !!}
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
    {!! $dataTable->scripts() !!}
@stop
