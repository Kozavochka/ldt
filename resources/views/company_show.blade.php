@extends('layouts.main')
@section('content')

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Предприятие {{$company->id}}</h5>
                    <p class="card-text"></p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>Отрасль</b> {{$company->industry->name}}</li>
                    <li class="list-group-item"><b>Подотрасль</b> {{$company->sub_industry->name}}</li>
                    <li class="list-group-item"><b>Местоположение</b>  {{$company->region->name}}</li>
                </ul>
                <div class="card-body">
                    <div class="dropdown">
                        <a class="dropdown-toggle" href=" " role="button" id="dropdownMenuLink"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            Затраты на обслуживание
                        </a>
                        <ul class="dropdown-menu">
                            <p><b>Общие затраты</b> {{$company->all_tax}} тыс. руб</p>
                            <p>Средние количество персонала: {{$company->staff}}</p>
                            <p>Средняя зарплата: {{$company->salary}} тыс. руб</p>
                            <br>
                            <p>Налог на прибыль: {{$company->tax->profit_tax}} тыс.руб</p>
                            <p>Налог на имущество: {{$company->tax->property_tax}} тыс.руб</p>
                            <p>Налог на землю: {{$company->tax->land_tax}} тыс.руб</p>
                            <p>НДФЛ: {{$company->tax->ndfl}} тыс.руб</p>
                            <p>Транспортный налог: {{$company->tax->transport_tax}} тыс.руб</p>
                            <p>Прочие: {{$company->tax->other_tax}} тыс.руб</p>
                        </ul>
                    </div>
                    <a href="#" class="card-link">Затраты на строительство</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
