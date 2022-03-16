<?php

namespace App\Http\Controllers\Admin;

use App\Contract;
use App\Materials;
use App\Materials_children;
use App\Mera;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Materials_childrenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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

        $ids = Materials_children::where('contract_id', '=', $id)->pluck('id')->all();
        $contract = Materials_children::find($ids)->all();
        $contract_number = Contract::find($id);
        $meras = Mera::pluck('title', 'id')->all();


        return view('admin.materials_children.edit',['contracts' => $contract,'id' => $id,
            'contract_number' => $contract_number, 'meras' => $meras]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
       $i = 0;
       foreach($request->get('id_child') as $id)
            {
                    $contract = Materials_children::find($id);
                    $contract->setMera($request->get('mera_id')[$i]);
                    $contract->setPriceForOne($request->get('price_for_one')[$i]);
                    $contract->setPriceDostavka($request->get('price_dostavka')[$i]);
                    $contract->setMaterialUnit($request->get('materials_unit')[$i]);
                $i++;
            }
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
        //
    }
}
