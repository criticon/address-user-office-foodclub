<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\City;
use App\Area;

class Address extends Model
{
    public $timestamps = false;

    public $fillable = ['city_id', 'area_id', 'name', 'street', 'house', 'additional_info'];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }
}
