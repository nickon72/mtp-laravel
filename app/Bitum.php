<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bitum extends Model
{
    protected $fillable = ['day1','day2','day3','day4','day5','day6','day7','day8','day9','day10','day11','day12','day13',
        'day14','day15','day16','day17','day18','day19','day20','day21','day22','day23','day24','day25','day26','day27','day28',
        'day29','day30','day31'];

    public static function add($fields)
    {
        $bitum = new static;
        $bitum->fill($fields);
        $bitum->save();

        return $bitum;

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
