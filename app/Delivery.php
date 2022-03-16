<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;


class Delivery extends Model
{
    protected $fillable = ['materials_id','date','company_id','mera_id','contract_id','filia_id','price','unit'];

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

    public function removeImage($name)
    {
        if($this->$name != null)
        {
            Storage::delete('uploads/' . $this->$name);
        }
    }

    //загрузка файла (ттн, накладная, счет)

    public function uploadImage($image,$name)
    {

        if($image == null) { return; }

        $this->removeImage($name);
        $filename = str_random(10) . '.' . $image->extension();
        $image->storeAs('uploads', $filename);
        $this->$name = $filename;
        $this->save();
    }

    public function getImage($name)
    {
        if($this->$name == null)
        {
            return '/img/no-image.png';
        }

        return '/uploads/' . $this->$name;

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


    //выборка всех поставок за определенный период период с группировкой по материалам общим количеством и ценой
    public static function getDeliveryDate($date,$exp)
    {
        $date = Carbon::createFromFormat('d/m/y', $date)->format('Y-m-d');
        $exp = Carbon::createFromFormat('d/m/y', $exp)->format('Y-m-d');
        $delivery = DB::table('deliveries')->select('materials_id','mera_id',DB::raw('sum(unit) as sum_unit'),DB::raw('sum(price*unit) as price_itog'))
            ->whereBetween('date', [$date, $exp])
            ->groupBy('materials_id','mera_id')
            ->get();

        return $delivery;

    }

    //SELECT materials_id, sum(unit) as sum_unit, sum(price*unit) as price_itog FROM `deliveries`
    //WHERE contract_id=44  group by (materials_id)
    //выбираем поставки материалов по определенному контракту
    //итожим объём и сумму по материалам
    public static function getMaterialsContract($id)
    {
        $deliveries = DB::table('deliveries')->select('materials_id',DB::raw('sum(unit) as sum_unit'),DB::raw('sum(price*unit) as price_itog'))
            ->where('contract_id','=',$id)
            ->groupBy('materials_id')
            ->get();

         return $deliveries;
    }

    //SELECT sum(unit) as sum_unit, sum(price*unit) as price_itog FROM `deliveries` WHERE contract_id=44
    //итожим сумму поставок и количества товара по контракту
    public static function getItogContract($id)
    {
       $deliveries_itog = DB::table('deliveries')->select(DB::raw('sum(unit) as sum_unit'),DB::raw('sum(price*unit) as price_itog'))
           ->where('contract_id','=',$id)
           ->get();

        return $deliveries_itog;

    }

    //выбираем поставки по списку материалов: $ids, название, количество общее, сумма за поставленый товар
    public static function getMaterialsDelivery($ids,$date,$exp)
    {
        $date = Carbon::createFromFormat('d/m/y', $date)->format('Y-m-d');
        $exp = Carbon::createFromFormat('d/m/y', $exp)->format('Y-m-d');
        $delivery = DB::table('deliveries')->select('materials_id','mera_id',DB::raw('sum(unit) as sum_unit'),DB::raw('sum(price*unit) as price_itog'))
            ->whereBetween('date', [$date, $exp])
            ->whereIN('materials_id',$ids)
            ->groupBy('materials_id','mera_id')
            ->get();

        return $delivery;

    }

    //выбираем поставки по списку компаний: $ids, название, количество общее, сумма за поставленый товар
    public static function getCompanyDelivery($ids,$date,$exp)
    {
        $date = Carbon::createFromFormat('d/m/y', $date)->format('Y-m-d');
        $exp = Carbon::createFromFormat('d/m/y', $exp)->format('Y-m-d');
        $delivery = DB::table('deliveries')->select('company_id','materials_id','mera_id',DB::raw('sum(unit) as sum_unit'),DB::raw('sum(price*unit) as price_itog'))
            ->whereBetween('date', [$date, $exp])
            ->whereIN('company_id',$ids)
            ->groupBy('company_id','materials_id','mera_id')
            ->get();

        return $delivery;

    }

    //выбираем поставки по списку филий: $ids, название, количество общее, сумма за поставленый товар
    public static function getFiliaDelivery($ids,$date,$exp)
    {
        $date = Carbon::createFromFormat('d/m/y', $date)->format('Y-m-d');
        $exp = Carbon::createFromFormat('d/m/y', $exp)->format('Y-m-d');
        $delivery = DB::table('deliveries')->select('filia_id','materials_id','mera_id',DB::raw('sum(unit) as sum_unit'),DB::raw('sum(price*unit) as price_itog'))
            ->whereBetween('date', [$date, $exp])
            ->whereIN('filia_id',$ids)
            ->groupBy('filia_id','materials_id','mera_id')
            ->get();

        return $delivery;

    }
}
