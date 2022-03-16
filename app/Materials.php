<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class Materials extends Model
{
    use Sluggable;


    public function contracts()
    {
        return $this->belongsToMany(
          Contract::class,
          'materials_childrens',
          'material_id',
          'contract_id'
        );
    }


    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    protected $fillable = ['title'];

    public static function add($fields)
    {
        $materials = new static;
        $materials->fill($fields);
        $materials->save();

        return $materials;

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


        public function getMaterialsTitle($id)
    {
        $material_title = Materials::find($id);

        return $material_title->title;
    }


}
