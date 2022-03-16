<?php

namespace App\Http\Controllers;

use App\Contract;
use App\Reference;
use Illuminate\Http\Request;
use App\Company;

class CompanyController extends Controller
{
    public function index()
    {
        $companys = Company::all();

        return view('company.index', ['companys' => $companys]);
    }


 public function show($id)
 {
     $companys = Company::all();
     $info_company = Company::find($id);
     $references = Reference::all()->where('company_id', $id);
     $contracts =Contract::all()->where('company_id', $id);

     return view('company.show', ['companys' => $companys,
                 'info_company' => $info_company,
                 'references' => $references,
                 'contracts' => $contracts
                  ]);
 }



}
