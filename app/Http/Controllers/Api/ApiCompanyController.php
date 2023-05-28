<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CompanyResource;
use App\Models\Company;
use App\Models\Industry;
use App\Models\SubIndustry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class ApiCompanyController extends Controller
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
                AllowedFilter::exact('industry_id'),//точечный по отрасли
                AllowedFilter::exact('sub_industry_id'),//точечный подотрасли
            ])
            ->paginate($perPage, '*', 'page', $page);


        return CompanyResource::collection($companies);

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
        return new CompanyResource($company);
    }


    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }


    public function destroy($id)
    {

    }

}
