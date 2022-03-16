<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class Company extends Model
{
    use Sluggable;
    protected $fillable = ['title','edrpou','address_index','address_sity','address_street',
        'bank_account','bank_mfo','phone','email','director_name','director_phone','note'];


    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }


    public function zayvkas()
    {
        return $this->hasMany(Zayvka::class);
    }

    public function references()
    {
        return $this->hasMany(Reference::class);
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

    public static function add($fields)
    {
        $company = new static;
        $company->fill($fields);
        $company->save();

        return $company;

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

    public function getCompanyTitle($id)
    {
        $company = Company::find($id);
        return $company->title;
    }


}
