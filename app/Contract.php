<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class Contract extends Model
{

    protected $fillable = ['type','number','date', 'expiration','price',
                            'quantity_full','note'];

    public function contract_dops()
    {
        return $this->hasMany(ContractDop::class);
    }

    public function deliverys()
    {
        return $this->hasMany(Delivery::class);
    }

    public function materials()
    {
        return $this->belongsToMany(
          Materials::class,
          'materials_childrens',
          'contract_id',
          'material_id'
        );
    }

    public function mera()
    {
        return $this->belongsToMany(
            Mera::class,
            'materials_childrens',
            'contract_id',
            'mera_id'
        );
    }


    public static function add($fields)
    {
        $contract = new static;
        $contract->fill($fields);
        $contract->save();

        return $contract;

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

    //загрузка файла (сертифткат, паспорт, контракт)

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

     public function setCompany($id)
     {
          if($id == null) {return;}
         $this->company_id =$id;
         $this->save();
     }

    public function setMaterials($ids)
    {

     if($ids == null){return;}
        $this->materials()->sync($ids);
    }

     public function getCompanyTitle($id)
     {
         $companies = Company::find($id);
         return $companies->title;
     }


    // $id = implode(',',$ids);
    //    $contract_id = DB::table('materials_childrens')->wherein('material_id',[$id])->pluck('contract_id');
//$contract = DB::table('contracts')->wherein('material_id',[$id])
//->join('materials_childrens','contracts.id','=','materials_childrens.contract_id')
//->wherein('material_id',[$id])
//->get();
    // dd($contract);
    //выбираем контракты в которых прописаны выбыраемый перечень материалов
    public static function getContractMaterials($ids)
    {
        $contract = Contract::wherein('material_id',$ids)->distinct()
                        ->join('materials_childrens','contracts.id','=','materials_childrens.contract_id')
                        ->orderBy('contracts.id')
                        ->get();

        return $contract;
    }

    //перечень выбранных материалов
      public static function getSelectedMaterial($ids)
      {
          $selectedMaterial = Materials::wherein('id',$ids)->pluck('title');
          return $selectedMaterial;
      }


    public function getCompanyID()
    {
        return $this->company != null ? $this->company->id : null;
    }


    public function getMaterialTitle()
    {
        return (!$this->materials->isEmpty())
            ?   implode(', ', $this->materials->pluck('title')->all())
            :   'нет товаров';
    }

    public function getMera()
    {
        return (!$this->mera->isEmpty())
            ?   implode(', ', $this->mera->pluck('title')->all())
            :   'нет единицы измерения';
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

    public function setExpirationAttribute($value)
    {
        $expiration = Carbon::createFromFormat('d/m/y', $value)->format('Y-m-d');

        $this->attributes['expiration'] = $expiration;
    }

    public function getExpiration($value)
    {
        $expiration = Carbon::createFromFormat('Y-m-d', $value)->format('d/m/y');

        return $expiration;

    }

    public function getTypeContract()
    {
        return $this->contract != null ? $this->contract->type : null;
    }

}
