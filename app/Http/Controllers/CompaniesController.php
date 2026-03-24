<?php

namespace App\Http\Controllers;

use App\Models\Company;

class CompaniesController extends Controller
{
    public function index()
    {
        $companies = Company::all();

        return response()->json([
            'data' => [
                'companies' => $companies,
            ],
        ]);
    }
}
