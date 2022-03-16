<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materials_child extends Model
{


    protected $fillable = ['materials_child_id', 'materials_id', 'price_for_one', 'materials_unit'];

    public static function add($fields)
    {
        $materials_child = new static;
        $materials_child->fill($fields);
        $materials_child->save();

        return $materials_child;

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
}
