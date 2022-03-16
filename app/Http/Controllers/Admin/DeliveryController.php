<?php

namespace App\Http\Controllers\Admin;

use App\Contract;
use App\Delivery;
use App\Filia;
use App\Mera;
use App\Materials;
use App\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $delivery = Delivery::all()->sortByDesc('id')->take(10);
        return view('admin.delivery.index',['deliverys' => $delivery]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $materials = Materials::pluck('title', 'id')->all();
        $filia = Filia::pluck('title', 'id')->all();
        $companies = Company::pluck('title', 'id')->all();
        $meras = Mera::pluck('title', 'id')->all();
        $contracts = Contract::pluck('number', 'id')->all();

        return view('admin.delivery.create', compact(
            'companies',
            'materials',
            'meras',
            'contracts',
            'filia'
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
            'materials_id'=> 'required',
            'date' => 'required',
            'company_id' => 'required',
            'mera_id' => 'required',
            'filia_id' => 'required',
            'contract_id' =>'required',
            'price' => 'required',
            'unit' => 'required'
        ]);

        $delivery = Delivery::add($request->all());
        $delivery->uploadImage($request->file('ttn'),'ttn');
        $delivery->uploadImage($request->file('vn'),'vn');
        $delivery->uploadImage($request->file('invoice'),'invoice');


        return redirect()->route('delivery.create');
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

        $delivery = Delivery::find($id);

        $materials = Materials::pluck('title', 'id')->all();
        $selectedMaterials = $delivery->materials_id;

        $contract = Contract::pluck('number', 'id')->all();
        $selectedContract = $delivery->contract_id;

        $mera = Mera::pluck('title', 'id')->all();
        $selectedMera = $delivery->mera_id;

        $filia = Filia::pluck('title', 'id')->all();
        $selectedFilia = $delivery->filia_id;

        $company = Company::pluck('title', 'id')->all();
        $selectedCompany = $delivery->company_id;

        return view('admin.delivery.edit', compact(
            'delivery',
            'mera',
            'selectedMera',
            'filia',
            'selectedFilia',
            'company',
            'selectedCompany',
            'materials',
            'selectedMaterials',
            'contract',
            'selectedContract'
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
        $this->validate($request, [
            'materials_id'=> 'required',
            'date' => 'required',
            'company_id' => 'required',
            'mera_id' => 'required',
            'filia_id' => 'required'
        ]);
        $delivery = Delivery::find($id);
        $delivery->edit($request->all());
        $delivery->uploadImage($request->file('ttn'),'ttn');
        $delivery->uploadImage($request->file('vn'),'vn');
        $delivery->uploadImage($request->file('invoice'),'invoice');


        return redirect()->route('delivery.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Delivery::find($id)->delete();
        return redirect()->route('delivery.index');
    }


}
