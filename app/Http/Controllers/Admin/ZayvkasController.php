<?php

namespace App\Http\Controllers\Admin;

use App\Filia;
use App\Company;
use App\Zayvka;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ZayvkasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $zayvka = Zayvka::all();
       return view('admin.zayvka.index',['zayvkas' => $zayvka]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::pluck('title', 'id')->all();
        $filia = Filia::pluck('title', 'id')->all();

        return view('admin.zayvka.create', compact(
            'companies',
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
            'number'=> 'required',
            'date' => 'required',
            'company_id' => 'required',
            'filia_id' => 'required'
        ]);

        $zayvka = Zayvka::add($request->all());
        $zayvka->uploadImage($request->file('image'));


        return redirect()->route('zayvka.index');
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
        $zayvka = Zayvka::find($id);


        $company = Company::pluck('title', 'id')->all();
        $selectedCompany = $zayvka->company_id;

        $filia = Filia::pluck('title', 'id')->all();
        $selectedFilia = $zayvka->filia_id;

        return view('admin.zayvka.edit', compact(
            'zayvka',
            'company',
            'filia',
            'selectedFilia',
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
        $this->validate($request, [
            'number'=> 'required',
            'date' => 'required',
            'company_id' => 'required',
            'filia_id' => 'required'
        ]);


        $zayvka = Zayvka::find($id);
        $zayvka->edit($request->all());
        $zayvka->uploadImage($request->file('image'));


        return redirect()->route('zayvka.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Zayvka::find($id)->delete();
        return redirect()->route('zayvka.index');

    }
}
