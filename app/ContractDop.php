<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ContractDop extends Model
{
    protected $fillable = ['number','contract_id','note'];

    public function contract()
    {
        return $this->hasOne(Contract::class);
    }

    public static function add($fields)
    {
        $contract_dop = new static;
        $contract_dop->fill($fields);
        $contract_dop->save();

        return $contract_dop;

    }

    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }


    public function getContractNumber($id)
    {
        $number = Contract::find($id);
        return $number->number;
    }

    public function remove()
    {
        $this->removeImage();
        $this->delete();
    }

    public function removeImage()
    {
        if($this->image != null)
        {
            Storage::delete('uploads/' . $this->image);
        }
    }

    public function uploadImage($image)
    {
        if($image == null) { return; }

        $this->removeImage();
        $filename = str_random(10) . '.' . $image->extension();
        $image->storeAs('uploads', $filename);
        $this->image = $filename;
        $this->save();
    }

    public function getImage()
    {
        if($this->image == null)
        {
            return '/img/no-image.png';
        }

        return '/uploads/' . $this->image;

    }
}
