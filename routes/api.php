<?php

use App\Http\Controllers\Api\ApiCompanyController;
use App\Http\Controllers\CompanyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::resource('companies',ApiCompanyController::class);
