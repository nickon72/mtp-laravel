<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Abz_drp extends Model
{
    use Sluggable;

    public function filia()
    {
        return $this->hasOne(Filia::class);
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    protected $fillable = ['filia_id','title'];

    public static function add($fields)
    {
        $abz_drp = new static;
        $abz_drp->fill($fields);
        $abz_drp->save();

        return $abz_drp;

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

    public function getFiliaTitle($id)
    {
        $filia = Filia::find($id);
        return $filia->title;
    }

    public function getFiliaID()
    {
        return $this->filia != null ? $this->filia->id : null;
    }
}
