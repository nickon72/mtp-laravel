<?php

namespace App\Http\Controllers\Admin;

use App\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class CompanyController extends Controller

{

    public function index()
    {
        $companys = Company::all();
        return view('admin.company.index', ['companys' => $companys]);
    }

    public function create()
    {
        return view('admin.company.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'director_name' => 'required',
            'director_phone' => 'required',
            'email' => 'email|unique:companies'
         ]);

        Company::create($request->all());
        return redirect()->route('company.index');
    }

    public function edit($id)
    {
        $company = Company::find($id);
        return view('admin.company.edit',['company' => $company]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'director_name' => 'required',
            'director_phone' => 'required',
            'email' => 'email'
        ]);

        $company = Company::find($id);

        $company->update($request->all());
        return redirect()->route('company.index');
    }

    public function destroy($id)
    {
        Company::find($id)->delete();
         return redirect()->route('company.index');
    }
}
