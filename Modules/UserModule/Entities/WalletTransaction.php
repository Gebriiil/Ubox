<?php

namespace Modules\UserModule\Entities;

use Illuminate\Database\Eloquent\Model;

class WalletTransaction extends Model
{
    protected $fillable = ['user_id','status','value'];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }


}
