<?php

namespace App\Http\Controllers;

use App\Delivery;
use App\Filia;
use App\Mera;
use App\Real_time;
use Illuminate\Http\Request;
use App\Materials;
use App\Company;
use App\Contract;
use DB;
use Excel;
use Maatwebsite\Excel\Concerns\FromCollection;

class DeliveryController extends Controller
{

    public function index()
    {
        $materials = Materials::all();
        $delivery = Delivery::getDelivery();
        return view('delivery.index', [
            'deliveries' => $delivery,
            'materials' => $materials
         ]);

    }

    public function index_date(Request $request)
    {
        $this->validate($request, [
            'date' => 'required',
            'expiration' => 'required'
                    ]);

        $materials = Materials::all();
        $date = $request->get('date');
        $exp = $request->get('expiration');
        $delivery = Delivery::getDeliveryDate($date,$exp);
        return view('delivery.index_date', [
            'deliveries' => $delivery,
            'materials' => $materials,
            'date' =>  $request->get('date'),
            'exp' => $request->get('expiration')
        ]);

    }

    public function delivery_materials()
    {

        $materials = Materials::all();
       // dd($materials);
        return view('delivery.materials', ['materials' => $materials]);
    }

    public function delivery_materials_show(Request $request)
    {
        $this->validate($request, [
            'date' => 'required',
            'expiration' => 'required',
            'material_id' => 'required'
        ]);
     //   dd($request->all());
        $materials = Materials::all();
        $ids = $request->get('material_id');
        $date = $request->get('date');
        $exp = $request->get('expiration');
        $delivery = Delivery::getMaterialsDelivery($ids,$date,$exp);
       // dd($delivery);

        return view('delivery.materials_show', [
            'deliveries' => $delivery,
            'materials' => $materials,
            'date' =>  $request->get('date'),
            'exp' => $request->get('expiration')
        ]);
    }

    public function delivery_company()
    {

        $companies = Company::all();
        // dd($materials);
        return view('delivery.company', ['companies' => $companies]);
    }

    public function delivery_company_show(Request $request)
    {

        $this->validate($request, [
            'date' => 'required',
            'expiration' => 'required',
            'company_id' => 'required'
        ]);

        //   dd($request->all());
        $materials = Materials::all();
        $companies = Company::all();
        $ids = $request->get('company_id');
        $date = $request->get('date');
        $exp = $request->get('expiration');
        $delivery = Delivery::getCompanyDelivery($ids,$date,$exp);
        // dd($delivery);

        return view('delivery.company_show', [
            'deliveries' => $delivery,
            'materials' => $materials,
            'companies' => $companies,
            'date' =>  $request->get('date'),
            'exp' => $request->get('expiration')
        ]);
    }

    public function delivery_filia()
    {

        $filias = Filia::all();
        return view('delivery.filia', ['filias' => $filias]);
    }

    public function delivery_filia_show(Request $request)
    {
        $this->validate($request, [
            'date' => 'required',
            'expiration' => 'required',
            'filia_id' => 'required'
        ]);

        //   dd($request->all());
        $materials = Materials::all();
        $filias = Filia::all();
        $ids = $request->get('filia_id');
        $date = $request->get('date');
        $exp = $request->get('expiration');
        $delivery = Delivery::getFiliaDelivery($ids,$date,$exp);
        // dd($delivery);

        return view('delivery.filia_show', [
            'deliveries' => $delivery,
            'filias' => $filias,
            'materials' => $materials,
            'date' =>  $request->get('date'),
            'exp' => $request->get('expiration')
        ]);
    }

    function excel()
    {
      //  $invoce = Real_time::all();
        return Excel::download( Real_time::all(), 'invoices.xls');
    }


}
