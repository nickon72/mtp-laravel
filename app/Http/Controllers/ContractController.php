<?php

namespace App\Http\Controllers;

use App\Company;
use App\Contract;
use App\ContractDop;
use App\Delivery;
use App\Materials;
use App\Materials_children;
use App\Mera;
use Illuminate\Http\Request;
use Carbon\Carbon;



class ContractController extends Controller
{
    public function index()
    {
        $contract = Contract::all();
        return view('contract.index', ['contracts' => $contract]);
    }


    public function show($id)
    {
        $contracts = Contract::all();
        $contract_info = Contract::find($id);
        $materials_child = Materials_children::all()->where('contract_id',$id);
        $contract_dop = ContractDop::all()->where('contract_id',$id);


        $deliveries = Delivery::getMaterialsContract($id);
        $deliveries_itog = Delivery::getItogContract($id);

        return view('contract.show', ['contracts' => $contracts,
            'materials_childs' => $materials_child,
            'contract_info' => $contract_info,
            'contract_dops' => $contract_dop,
            'deliveries' => $deliveries,
            'deliveries_itog' => $deliveries_itog
        ]);
    }


    public function contract_active()
    {
        $current_date = Carbon::now();
        $contract = Contract::all()->where('expiration','>=',$current_date);
        return view('contract.active', ['contracts' => $contract]);
    }


    public function contract_active_show($id)
    {
          $current_date = Carbon::now();
          $contracts = Contract::all()->where('expiration','>=',$current_date);
          $contract_info = Contract::find($id);
          $materials_child = Materials_children::all()->where('contract_id',$id);
          $contract_dop = ContractDop::all()->where('contract_id',$id);


          $deliveries = Delivery::getMaterialsContract($id);
          $deliveries_itog = Delivery::getItogContract($id);

          return view('contract.active_show', ['contracts' => $contracts,
              'materials_childs' => $materials_child,
              'contract_info' => $contract_info,
              'contract_dops' => $contract_dop,
              'deliveries' => $deliveries,
              'deliveries_itog' => $deliveries_itog

          ]);


    }

    public function contract_tender()
    {
        $type = 'tender';
        $contract = Contract::all()->where('type','=',$type);
        return view('contract.tender', ['contracts' => $contract]);
    }


    public function contract_tender_show($id)
    {
        $type = 'tender';
        $contracts = Contract::all()->where('type','=',$type);
        $contract_info = Contract::find($id);
        $materials_child = Materials_children::all()->where('contract_id',$id);
        $contract_dop = ContractDop::all()->where('contract_id',$id);


        $deliveries = Delivery::getMaterialsContract($id);
        $deliveries_itog = Delivery::getItogContract($id);

        return view('contract.tender_show', ['contracts' => $contracts,
            'materials_childs' => $materials_child,
            'contract_info' => $contract_info,
            'contract_dops' => $contract_dop,
            'deliveries' => $deliveries,
            'deliveries_itog' => $deliveries_itog
        ]);


    }

    public function contract_direct()
    {
        $type = 'direct';
        $contract = Contract::all()->where('type','=',$type);
        return view('contract.direct', ['contracts' => $contract]);
    }


    public function contract_direct_show($id)
    {
        $type = 'direct';
        $contracts = Contract::all()->where('type','=',$type);
        $contract_info = Contract::find($id);
        $materials_child = Materials_children::all()->where('contract_id',$id);
        $contract_dop = ContractDop::all()->where('contract_id',$id);


        $deliveries = Delivery::getMaterialsContract($id);
        $deliveries_itog = Delivery::getItogContract($id);

        return view('contract.direct_show', ['contracts' => $contracts,
            'materials_childs' => $materials_child,
            'contract_info' => $contract_info,
            'contract_dops' => $contract_dop,
            'deliveries' => $deliveries,
            'deliveries_itog' => $deliveries_itog
        ]);
    }

    public function contract_choose_materials()
    {
        $materials = Materials::pluck('title', 'id')->all();
        return view('contract.choose_materials', ['materials' => $materials]);
    }

    public function contract_materials(Request $request)
    {
        $this->validate($request, [
            'material_id' => 'required'
        ]);
        $id = $request->get('material_id');
        $ids = implode(',',$id);
        $contract = Contract::getContractMaterials($id);

        $materials = Contract::getSelectedMaterial($id);
      //  dd($materials);

                return view('contract.materials', [
                    'contracts' => $contract,
                    'materials' => $materials,
                    'ids' =>$ids,
                    'id' =>$id
        ]);
    }


    public function contract_materials_show()
    {
        $ids = explode(',', $_POST['ids']);

        $id = $_POST['id'];

        $contracts = Contract::getContractMaterials($ids);
        $materials = Contract::getSelectedMaterial($ids);
        $contract_info = Contract::find($id);
        $materials_child = Materials_children::all()->where('contract_id',$id);
        $contract_dop = ContractDop::all()->where('contract_id',$id);


        $deliveries = Delivery::getMaterialsContract($id);
        $deliveries_itog = Delivery::getItogContract($id);

        return view('contract.materials_show', [
            'contracts' => $contracts,
            'materials_childs' => $materials_child,
            'contract_info' => $contract_info,
            'contract_dops' => $contract_dop,
            'materials' => $materials,
            'ids' =>$_POST['ids'],
            'deliveries' => $deliveries,
            'deliveries_itog' => $deliveries_itog
        ]);


    }
}
