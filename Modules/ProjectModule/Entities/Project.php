<?php

namespace Modules\ProjectModule\Entities;

use Illuminate\Database\Eloquent\Model;
use Dimsav\Translatable\Translatable;
class Project extends Model
{
	use Translatable;
	protected $table='projects';
    protected $fillable = ['image'];
    protected $translatedAttributes=['name','desc','locale'];
}
