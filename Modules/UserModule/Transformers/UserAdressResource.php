<?php

namespace Modules\UserModule\Transformers;

use Illuminate\Http\Resources\Json\Resource;

class UserAdressResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "longitude" => $this->longitude,
            "latitude" => $this->latitude,
            "phone" => $this->phone,
            "address" => $this->address,
            "flat_num" => $this->flat_num,
            "building_num" => $this->building_num,
            "floor_num" => $this->floor_num,
            "other" => $this->other,
            "city" => $this->city->name,
            "zone" => $this->zone->name,
            "government" => $this->government->name,


        ];
    }
}
