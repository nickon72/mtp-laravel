<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materials_children extends Model
{


    public function mera()
    {
        return $this->hasOne(Mera::class);
    }


    protected $fillable = ['price_for_one','price_dostavka', 'materials_unit'];

    public static function add($fields)
    {
        $materials_children = new static;
        $materials_children->fill($fields);
        $materials_children->save();

        return $materials_children;

    }

    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }

    public function remove()
    {
        $this->delete();
    }

    public function getMaterialTitle($id)
    {
        $materials = Materials::find($id);
        return $materials->title;

    }

    public function getMeraTitle($id)
    {
        $mera = Mera::find($id);
        return $mera->title;

    }

    public function setMera($id)
    {
        if($id == null) {return;}
        $this->mera_id =$id;
        $this->save();
    }

    public function setPriceForOne($id)
    {
        if($id == null) {return;}
        $this->price_for_one =$id;
        $this->save();
    }

    public function setPriceDostavka($id)
    {
        if($id == null) {return;}
        $this->price_dostavka =$id;
        $this->save();
    }

    public function setMaterialUnit($id)
    {
        if($id == null) {return;}
        $this->materials_unit =$id;
        $this->save();
    }



}
