<?php

namespace App\Http\Controllers;

use App\Http\Resources\CompanyResource;
use App\Models\Company;
use App\Models\Industry;
use App\Models\Region;
use App\Models\SubIndustry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class CompanyController extends Controller
{

    public function index()
    {
        $page = request('page', 1);
        $perPage = request('per_page', 6);

        $companies =QueryBuilder::for(Company::class)
            ->with('industry')
            ->with('sub_industry')
            ->with('tax')
            ->with('region')
            ->allowedFilters([
                AllowedFilter::exact('industry_id'),//точечный фильтр по отрасли
                AllowedFilter::exact('sub_industry_id'),//точечный фильтр подотрасли
                AllowedFilter::exact('region_id'),//точечный фильтр региона
            ])
            ->paginate($perPage, '*', 'page', $page);

        $industries = Industry::query()
            ->distinct()
            ->get();

        $sub_industries = SubIndustry::query()
            ->distinct()
            ->get();

        $regions = Region::query()
            ->distinct()
            ->get();

        return view('companies', compact('companies', 'industries', 'sub_industries', 'regions'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Company $company)
    {
        return view('company_show', compact('company'));
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {

    }



}
