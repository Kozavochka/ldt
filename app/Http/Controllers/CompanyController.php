<?php

namespace App\Http\Controllers;

use App\Http\Resources\CompanyResource;
use App\Models\Company;
use App\Models\Industry;
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
                AllowedFilter::exact('industry_id'),//точечный по отрасли
                AllowedFilter::exact('sub_industry_id'),//точечный подотрасли
            ])
            ->paginate($perPage, '*', 'page', $page);

        $industries = Industry::query()
            ->distinct()
            ->get();

        $sub_industries = SubIndustry::query()
            ->distinct()
            ->get();

//        return CompanyResource::collection($companies);
        return view('companies', compact('companies', 'industries', 'sub_industries'));
    }


    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }


    public function show(Company $company)
    {
        return view('company_show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function fincance_expense()
    {
        
    }
    
    
    public function fill_rand()
    {
        $records = DB::table('companies')->get();


        // Обновляем каждую запись, заполняя поле 'field_name' случайным числом от 1 до 100
        foreach ($records as $record) {
            DB::table('companies')
                ->where('id', $record->id)
                ->update(['region_id' => rand(1, 12)]);
        }

        return [
            'result' => true,
        ];
    }
}
