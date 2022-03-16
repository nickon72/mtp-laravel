<?php

namespace App\Http\Controllers\Admin;

use App\Abz_drp;
use App\Filia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Abz_drpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abz_drp = Abz_drp::all();
        return view('admin.abz_drp.index',['abz_drps' => $abz_drp]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $filia = Filia::pluck('title', 'id')->all();
        return view('admin.abz_drp.create',['filia' => $filia]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        {
            $this->validate($request, [
                'title' => 'required',
                'filia_id' => 'required'
            ]);

            Abz_drp::create($request->all());
            return redirect()->route('abz_drp.index');
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
        $abz_drp = Abz_drp::find($id);
        $filia = Filia::pluck('title', 'id')->all();

        return view('admin.abz_drp.edit', compact(
            'abz_drp',
            'filia'
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
                'title' => 'required',
                'filia_id' => 'required'
            ]);

            $abz_drp = Abz_drp::find($id);
            $abz_drp->edit($request->all());
        }
        return redirect()->route('abz_dpr.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Abz_drp::find($id)->delete();
        return redirect()->route('abz_drp.index');
    }
}
