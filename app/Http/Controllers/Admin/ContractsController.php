<?php

namespace App\Http\Controllers\Admin;

use App\Contract;
use App\Company;
use App\Materials;
use App\Mera;
use App\Materials_child;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContractsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $contracts = Contract::all();
        return view('admin.contract.index',['contracts' => $contracts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::pluck('title', 'id')->all();
        $materials = Materials::pluck('title', 'id')->all();

        return view('admin.contract.create', compact(
            'companies',
            'materials'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // dd($request->all());
        $this->validate($request, [
           'number'=> 'required',
            'date' => 'required',
            'expiration' => 'required'
        ]);
  //        dd($request->get('material_id'));

        $contract = Contract::add($request->all());
        $contract->setCompany($request->get('company_id'));
        $contract->setMaterials($request->get('material_id'));
        $contract->uploadImage($request->file('sertificat'),'sertificat');
        $contract->uploadImage($request->file('pasport'),'pasport');
        $contract->uploadImage($request->file('contract'),'contract');


        return redirect()->route('contract.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      //  dd($id);
        $contract = Contract::find($id);
        $selectedContract = $contract->type;

        $company = Company::pluck('title', 'id')->all();
        $selectedCompany = $contract->company_id;

        $materials = Materials::pluck('title', 'id')->all();
        $selectedMaterials = $contract->materials->pluck('id')->all();

        return view('admin.contract.edit', compact(
            'contract',
            'company',
            'materials',
            'selectedMaterials',
            'selectedContract',
            'selectedCompany'
        ));

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
       // dd($request->all());
        $this->validate($request, [
            'number'=> 'required',
            'date' => 'required',
            'expiration' => 'required'
        ]);
        $contract = Contract::find($id);
        $contract->edit($request->all());
        $contract->setCompany($request->get('company_id'));
        $contract->setMaterials($request->get('material_id'));
        $contract->uploadImage($request->file('sertificat'),'sertificat');
        $contract->uploadImage($request->file('pasport'),'pasport');
        $contract->uploadImage($request->file('contract'),'contract');


        return redirect()->route('contract.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Contract::find($id)->delete();
        return redirect()->route('contract.index');
    }
}
