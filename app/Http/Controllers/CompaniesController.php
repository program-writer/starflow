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

    public function show($id)
    {
        $company = Company::where('id', $id)->firstOrFail();

        return response()->json([
            'data' => [
                'company' => $company,
            ],
        ]);
    }
}
