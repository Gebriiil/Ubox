<?php

namespace Modules\UserModule\Transformers;

use Illuminate\Http\Resources\Json\Resource;

class UserResource extends Resource
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
            'name'=>$this->name,
            'email'=>$this->email,
            'phone'=>$this->phone,
            'birth_date'=>$this->birth_date,
            'gender'=>$this->gender,
            'num_of_people'=>$this->num_of_people,
            'city'=>$this->city->name,
            'wallet'=>$this->wallet,
            'parent_name' => $this->parent->name ?? '',
            'affiliate' => $this->affiliate_code,
            'device_id' => $this->device_id,
            'platform' => $this->platform,

        ];
    }
}
