@extends('layouts.main')
@section('content')
<div class="container">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        @foreach( $companies as $company)
            <div class="col">
                <div class="id">
                    <a href="{{route('companies.show', $company)}}"><i class="fa-solid fa-house fa-xl"></i></a>
                    {{$company->id}}   {{$company->region->name}}
                </div>
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
@endsection
