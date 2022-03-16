<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class Zayvka extends Model
{
    public function company()
    {
        return $this->hasOne(Company::class);
    }

    public function filia()
    {
        return $this->hasMany(Filia::class);
    }

    protected $fillable = ['number', 'date', 'company_id', 'filia_id'];

    public static function add($fields)
    {
        $zayvka = new static;
        $zayvka->fill($fields);
        $zayvka->save();

        return $zayvka;

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

    public function getImageZ($image)
    {
        if($image == null)
        {
            return '/img/no-image.png';
        }

        return '/uploads/' . $image;

    }

    public function getCompanyTitle($id)
    {
        $companies = Company::find($id);
        return $companies->title;
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

    //выбирам заявки за период
    public static function getZayvkaDate($date,$exp)
    {
        $date = Carbon::createFromFormat('d/m/y', $date)->format('Y-m-d');
        $exp = Carbon::createFromFormat('d/m/y', $exp)->format('Y-m-d');
        $zayvka = DB::table('zayvkas')->select('*')
            ->whereBetween('date', [$date, $exp])
            ->get();

        return $zayvka;

    }


    //выбираем заявки по списку компаний: $ids, за период
    public static function getZayvkaCompany($ids,$date,$exp)
    {
        $date = Carbon::createFromFormat('d/m/y', $date)->format('Y-m-d');
        $exp = Carbon::createFromFormat('d/m/y', $exp)->format('Y-m-d');
        $zayvka = DB::table('zayvkas')->select('*')
            ->whereBetween('date', [$date, $exp])
            ->whereIN('company_id',$ids)
            ->get();

        return $zayvka;

    }
}
