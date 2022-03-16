<?php

namespace App\Http\Controllers\Admin;

use App\Filia;
use App\Company;
use App\Materials;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Real_time;


class Real_timeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $real_time = Real_time::all()->sortByDesc('date');
        return view('admin.real_time.index',['real_times' => $real_time]);
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

//          return compact('companies','materials','filia');
        return view('admin.real_time.create', compact(
            'companies',
            'materials',
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
            'filia_id' => 'required',
            'quantity' => 'required'
        ]);

        Real_time::add($request->all());

        return redirect()->route('real_time.index');
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

        $real_time = Real_time::find($id);

        $materials = Materials::pluck('title', 'id')->all();
        $selectedMaterials = $real_time->materials_id;

        $filia = Filia::pluck('title', 'id')->all();
        $selectedFilia = $real_time->filia_id;

        $company = Company::pluck('title', 'id')->all();
        $selectedCompany = $real_time->company_id;

        return view('admin.real_time.edit', compact(
            'real_time',
            'filia',
            'selectedFilia',
            'company',
            'selectedCompany',
            'materials',
            'selectedMaterials'
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
            'filia_id' => 'required'
        ]);
        $real_time = real_time::find($id);
        $real_time->edit($request->all());


        return redirect()->route('real_time.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Real_time::find($id)->delete();
        return redirect()->route('real_time.index');
    }
}

