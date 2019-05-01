<?php

namespace Modules\UserModule\Entities;

use Modules\AreaModule\Entities\City;
use Modules\CartModule\Entities\Cart;
use Modules\OrderModule\Entities\Order;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Modules\PackageModule\Entities\Package;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable  implements \Illuminate\Contracts\Auth\Authenticatable
{
    use Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'password',
        'phone',
        'birth_date',
        'gender',
        'affiliate_code',
        'rank',
        'parent_id',
        'num_of_people',
        'city_id',
        'first_name',
        'last_name',
        'device_id','platform'

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','api_token',
    ];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function cart(){
        return $this->hasOne(Cart::class , 'user_id' , 'id');
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    function  address(){
        return $this->hasMany(UserAddress::class);
    }

    function orders(){

        return $this->hasMany(Order::class);
    }

    function parent(){

        return $this->belongsTo(User::class,'parent_id','id');
    }

    public function transactions()
    {
        return $this->hasMany(WalletTransaction::class,'user_id');
    }
    function packages()
    {
        return $this->belongsToMany(Package::class)->where('type','user');
    }

    function city(){
        return $this->belongsTo(City::class,'city_id','id');
    }

    public function wishlist(){

        return $this->belongsToMany('Modules\ProductModule\Entities\Product' , 'wishlists' ,'user_id' , 'product_id' );

    }

}
