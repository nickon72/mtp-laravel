<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mera extends Model
{



    public function materials()
    {
        return $this->hasMany(Materials_children::class);
    }


    protected $fillable = ['title'];

    public static function add($fields)
    {
        $mera = new static;
        $mera->fill($fields);
        $mera->save();

        return $mera;

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


    public function getMera($id)
    {
        $mera_title = Mera::find($id);

        return $mera_title->title;
    }

    public static function getMeraTitle($id)
    {
        $mera_title = Mera::find($id);

        return $mera_title->title;
    }



}
