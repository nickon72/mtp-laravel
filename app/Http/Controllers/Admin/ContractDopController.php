<?php

namespace App\Http\Controllers\Admin;

use App\ContractDop;
use App\Contract;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContractDopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contract_dop = ContractDop::all();
        return view('admin.contract_dop.index',['contract_dops' => $contract_dop]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contract = Contract::pluck('number', 'id')->all();
        return view('admin.contract_dop.create',['contracts' => $contract]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //  dd($request->all());
        {
            $this->validate($request, [
                'number' => 'required',
                'contract_id' => 'required'
            ]);

            $contract_dop = ContractDop::create($request->all());
            $contract_dop->uploadImage($request->file('image'));
            return redirect()->route('contract_dop.index');
        }
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
        $contract_dop = ContractDop::find($id);
        $contracts = Contract::pluck('number', 'id')->all();

        return view('admin.contract_dop.edit', compact(
            'contract_dop',
            'contracts'
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

        {
            $this->validate($request, [
                'number' => 'required',
                'contract_id' => 'required'
            ]);

            $contract_dop = ContractDop::find($id);
            $contract_dop->uploadImage($request->file('image'));
            $contract_dop->edit($request->all());
        }

        return redirect()->route('contract_dop.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       ContractDop::find($id)->delete();
        return redirect()->route('contract_dop.index');
    }
}
