<?php

namespace App\Http\Controllers;

use App\Zayvka;
use App\Company;
use Illuminate\Http\Request;


class ZayvkaController extends Controller
{
    public function index()
    {
        $zayvkas = Zayvka::get();

          return view('zayvka.index', [
            'zayvkas' => $zayvkas
        ]);

    }

    public function index_date()
    {

        return view('zayvka.index_date');

    }



    public function zayvka_date(Request $request)
    {
      //  dd($request->all());

        $zayvka_class = new Zayvka();//єкземпляр класса заявки
        $date = $request->get('date');
        $exp = $request->get('expiration');
        $zayvkas = Zayvka::getZayvkaDate($date,$exp);


        return view('zayvka.zayvka_date', [
            'zayvkas' => $zayvkas,
            'date' =>  $request->get('date'),
            'exp' => $request->get('expiration'),
            'zayvka_class' => $zayvka_class

        ]);

    }


    public function zayvka_company()
    {
        $company = Company::get();

        return view('zayvka.zayvka_company', [
            'companies' => $company
        ]);

    }


    public function zayvka_company_show(Request $request)
    {
        $company = Company::get();
        $zayvka_class = new Zayvka();
        $ids = $request->get('company_id');
        $date = $request->get('date');
        $exp = $request->get('expiration');
        $zayvkas = Zayvka::getZayvkaCompany($ids,$date,$exp);

        return view('zayvka.zayvka_company_show', [
            'zayvkas' => $zayvkas,
            'companies' => $company,
            'date' =>  $request->get('date'),
            'exp' => $request->get('expiration'),
            'zayvka_class' => $zayvka_class
        ]);

    }



}
