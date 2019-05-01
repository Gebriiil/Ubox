<?php

namespace Modules\UserModule\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\AreaModule\Entities\City;
use Modules\AreaModule\Entities\Government;
use Modules\AreaModule\Entities\Zone;

class UserAddress extends Model
{
    protected $fillable = [
        'longitude', 'latitude', 'phone', 'address', 'flat_num',
        'building_num', 'floor_num', 'other', 'user_id', 'city_id',
        'zone_id', 'government_id'
    ];
    protected $hidden=['getGovernment','getCity','getZone'];
    protected $appends =['government','city','zone'];

    function user()
    {
        return $this->belongsTo(User::class);
    }

    function getGovernment(){
        return $this->belongsTo(Government::class,'government_id');
    }

    function getGovernmentAttribute(){
        return $this->getGovernment;
    }

    function getZone(){
        return $this->belongsTo(Zone::class,'zone_id');
    }

    function getZoneAttribute(){
        return $this->getZone;
    }
    function getCity(){
        return $this->belongsTo(City::class,'city_id');
    }

    function getCityAttribute(){
        return $this->getCity;
    }
}
