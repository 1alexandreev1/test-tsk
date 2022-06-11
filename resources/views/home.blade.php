@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Что вернуть?</div>

                <div class="card-body">
                    <a class="btn btn-warning" href="{{ route('yandex.data') }}">Яндекс</a>
                    <a class="btn btn-primary" href="{{ route('ozon.data') }}">Озон</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
