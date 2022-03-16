<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Filia extends Model
{

    use Sluggable;

    public function abz_drps()
    {
        return $this->hasMany(Abz_drp::class);
    }

    public function deliverys()
    {
        return $this->hasMany(Delivery::class);
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    protected $fillable = ['title','address', 'director', 'phone', 'email', 'note'];

    public static function add($fields)
    {
        $filia = new static;
        $filia->fill($fields);
        $filia->save();

        return $filia;

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

    public function getFiliaTitle($id){
        $filia = Filia::find($id);
        return $filia->title;
    }
}
