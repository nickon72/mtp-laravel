<?php

namespace App\Http\Controllers\Admin;

use App\Filia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FiliasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $filias = Filia::all();
        return view('admin.filia.index',['filias' => $filias]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.filia.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'director' => 'required',
            'phone' => 'required',
            'email' => 'email|unique:filias'
        ]);

        Filia::create($request->all());
        return redirect()->route('filia.index');
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
        $filia = Filia::find($id);
        return view('admin.filia.edit',['filia' => $filia]);
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
            'title' => 'required',
            'director' => 'required',
            'phone' => 'required',
            'email' => 'email'
        ]);

        $filia = Filia::find($id);

        $filia->update($request->all());
        return redirect()->route('filia.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Filia::find($id)->delete();
        return redirect()->route('filia.index');
    }
}
