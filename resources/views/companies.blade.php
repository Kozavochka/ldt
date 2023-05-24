<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Companies</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/companies.css') }}">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="">Home</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="album py-5 bg-light">
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            @foreach( $companies as $company)
                <div class="col">
                    <div class="id"> {{$company->id}}</div>
                    Отрасль
                    <p>{{$company->industry->name}}</p>
                    Подотрасль
                    <p>{{$company->sub_industry->name}}</p>
                </div>
            @endforeach
        </div>
        <div class="filters">
            <div class="dropdown">
                <a class="btn btn-secondary dropdown-toggle" href=" " role="button" id="dropdownMenuLink"
                   data-bs-toggle="dropdown" aria-expanded="false">
                    Фильтр отрасли
                </a>
                @include('filter_industry')
            </div>
            <div class="dropdown">
                <a class="btn btn-secondary dropdown-toggle" href=" " role="button" id="dropdownMenuLink"
                   data-bs-toggle="dropdown" aria-expanded="false">
                    Фильтр подотрасли
                </a>
                @include('filter_sub_industry')
            </div>
            <a href="{{ url()->current() }}?{{ http_build_query(request()->except('filter')) }}">Сбросить фильтр</a>
        </div>
        <div class="mt-3">
            {{$companies->withQueryString()->links('pagination::bootstrap-5')}}
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>
</body>
</html>
