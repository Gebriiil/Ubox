<?php

namespace Modules\JobModule\Entities;

use Illuminate\Database\Eloquent\Model;
use Dimsav\Translatable\Translatable;

class JobCategory extends Model
{
    use Translatable;

    protected $guarded = [];

    public $translatedAttributes=['name','desc'];

    public function jobs()
    {
    	return $this->hasMany(Job::class);
    }
}
