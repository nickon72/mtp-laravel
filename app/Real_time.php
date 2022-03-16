<?php

namespace App;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\EditableGrid;

class Real_time extends Model
{

    protected $fillable = ['materials_id','date','company_id','filia_id','quantity'];

    public function materials()
    {
        return $this->hasOne(Materials::class);
    }

    public function contract()
    {
        return $this->hasOne(Contract::class);

    }
    public function company()
    {
        return $this->hasOne(Company::class);
    }

    public function filia()
    {
        return $this->hasOne(Filia::class);
    }

    public static function add($fields)
    {
        $delivery = new static;
        $delivery->fill($fields);
        $delivery->save();

        return $delivery;

    }

    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }

    public function remove()
    {
        $this->removeImage();
        $this->delete();
    }


    public function getMaterialTitle($id)
    {
        $materials = Materials::find($id);
        return $materials->title;

    }

    public function getMera($id)
    {
        $mera = Mera::find($id);
        return $mera->title;
    }



    public function getCompanyTitle($id)
    {
        $company = Company::find($id);
        return $company->title;
    }



    public function getCompanyID()
    {
        return $this->company != null ? $this->company->id : null;
    }

    public function getContract($id)
    {
        $contract = Contract::find($id);
        return $contract->number;
    }

    public function getFiliaTitle($id)
    {
        $filia = Filia::find($id);
        return $filia->title;
    }

    public function setDateAttribute($value)
    {
        $date = Carbon::createFromFormat('d/m/y', $value)->format('Y-m-d');

        $this->attributes['date'] = $date;

    }

    public function getDate($value)
    {
        $date = Carbon::createFromFormat('Y-m-d', $value)->format('d/m/y');

        return $date;

    }

    //выборка всех поставок за весь период с группировкой по материалам общим количеством и ценой
    public static function getDelivery()
    {
        $delivery = DB::table('deliveries')->select('materials_id','mera_id',DB::raw('sum(unit) as sum_unit'),DB::raw('sum(price*unit) as price_itog'))
            ->groupBy('materials_id','mera_id')
            ->get();

        return $delivery;

    }

    public function loaddate()
    {
        $grid = new EditableGrid();
        $grid->addColumn('id', 'ID', 'integer', NULL, false);
        /* The column id_country and id_continent will show a list of all available countries and continents. So, we select all rows from the tables */
        $grid->addColumn('filia_id', 'filia', 'string' , Filia::pluck('name', 'id')->all);
        $grid->addColumn('materials_id', 'material', 'string', Materials::pluck('name', 'id')->all);
        $grid->addColumn('company_id', 'Company', 'string', Company::pluck('name', 'id')->all);
        $grid->addColumn('date', 'date_postavka', 'date');
        $grid->addColumn('quantity', 'quantity', 'float');
        $grid->addColumn('action', 'Action', 'html', NULL, false, 'id');

        $result = Real_time::all();
        $grid->renderJSON($result,false, false, !isset($_GET['data_only']));
    }

}





